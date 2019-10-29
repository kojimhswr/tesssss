<?php

namespace App\Http\Controllers\Admin;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Contracts\ShipContract;
use App\Contracts\RegionContract;
use App\Contracts\PackageContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StorePackageFormRequest;

class PackageController extends BaseController
{
    protected $shipRepository;

    protected $regionRepository;

    protected $packageRepository;

    public function __construct(
        ShipContract $shipRepository,
        RegionContract $regionRepository,
        PackageContract $packageRepository
    )
    {
        $this->shipRepository = $shipRepository;
        $this->regionRepository = $regionRepository;
        $this->packageRepository = $packageRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->listPackages();

        $this->setPageTitle('Packages', 'Packages List');
        return view('admin.packages.index', compact('packages'));
    }

    public function one_way()
    {
        return view('admin.packages.itinerary');
    }

    public function create()
    {
        $ships = $this->shipRepository->listShips('name', 'asc');
        $regions = $this->regionRepository->listRegions('name', 'asc');

        $this->setPageTitle('Packages', 'Create Package');
        return view('admin.packages.create', compact('regions', 'ships'));
    }

    public function store(StorePackageFormRequest $request)
    {
        $params = $request->except('_token');

        $package = $this->packageRepository->createPackage($params);

        $id =$package->id;
        for ($i=0; $i < count($request->itinary_name1) ; $i++) { 
            $itinerary =new Itinerary;
            $itinerary->package_id =$id;
            $itinerary->time1 =$request->time1[$i];
            $itinerary->itinary_name1 =$request->itinary_name1[$i];
            $itinerary->save();
        }

        if (!$package) {
            return $this->responseRedirectBack('Error occurred while creating package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.packages.index', 'Package added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $package = $this->packageRepository->findPackageById($id);
        $ships = $this->shipRepository->listShips('name', 'asc');
        $regions = $this->regionRepository->listRegions('name', 'asc');

        $this->setPageTitle('Packages', 'Edit Package');
        return view('admin.packages.edit', compact('regions', 'ships', 'package'));
    }

    public function update(StorePackageFormRequest $request)
    {
        $params = $request->except('_token');

        $package = $this->packageRepository->updatePackage($params);
        
        $id =$package->id;

        $one =Itinerary::where('package_id',$id);
        $delete1 =$one->delete();

        if ($delete1) {
            for ($i=0; $i <count($request->itinary_name1) ; $i++) { 
              $itinerary =new Itinerary;
              $itinerary->package_id =$id;
              $itinerary->time1 =$request->time1[$i];
              $itinerary->itinary_name1 =$request->itinary_name1[$i];
              $itinerary->save();
            }
        }

        if (!$package) {
            return $this->responseRedirectBack('Error occurred while updating package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.packages.index', 'Package updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $package = $this->packageRepository->deletePackage($id);

        if (!$package) {
            return $this->responseRedirectBack('Error occurred while deleting package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.packages.index', 'Package deleted successfully' ,'success',false, false);
    }
}
