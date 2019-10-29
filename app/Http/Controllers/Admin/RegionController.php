<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\RegionContract;
use App\Http\Controllers\BaseController;

/**
 * Class RegionController
 * @package App\Http\Controllers\Admin
 */
class RegionController extends BaseController
{
    /**
     * @var RegionContract
     */
    protected $regionRepository;

    /**
     * RegionController constructor.
     * @param RegionContract $regionRepository
     */
    public function __construct(RegionContract $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $regions = $this->regionRepository->listRegions();

        $this->setPageTitle('Regions', 'List of all regions');
        return view('admin.regions.index', compact('regions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $regions = $this->regionRepository->treeList();

        $this->setPageTitle('Regions', 'Create Region');
        return view('admin.regions.create', compact('regions'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $region = $this->regionRepository->createRegion($params);

        if (!$region) {
            return $this->responseRedirectBack('Error occurred while creating region.', 'error', true, true);
        }
        return $this->responseRedirect('admin.regions.index', 'Region added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetRegion = $this->regionRepository->findRegionById($id);
        $regions = $this->regionRepository->treeList();

        $this->setPageTitle('Regions', 'Edit Region : '.$targetRegion->name);
        return view('admin.regions.edit', compact('regions', 'targetRegion'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $region = $this->regionRepository->updateRegion($params);

        if (!$region) {
            return $this->responseRedirectBack('Error occurred while updating region.', 'error', true, true);
        }
        return $this->responseRedirectBack('Region updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $region = $this->regionRepository->deleteRegion($id);

        if (!$region) {
            return $this->responseRedirectBack('Error occurred while deleting region.', 'error', true, true);
        }
        return $this->responseRedirect('admin.regions.index', 'Region deleted successfully' ,'success',false, false);
    }
}
