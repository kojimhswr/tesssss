<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Contracts\PackageContract;
use App\Contracts\AttributeContract;
use App\Contracts\RegionContract;



class PackageController extends Controller
{

    protected $attributeRepository;
    protected $packageRepository;
    protected $regionRepository;

    public function __construct(PackageContract $packageRepository, AttributeContract $attributeRepository, RegionContract $regionRepository)
    {
        $this->packageRepository = $packageRepository;
        $this->attributeRepository = $attributeRepository;
        $this->regionRepository = $regionRepository;

    }

    public function showPackage($slug)
    {
        $package = $this->packageRepository->findPackageBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        return response()->json(['pesan'=>'berhasil', 'package'=>$package, 'attributes'=>$attributes]);
    }

    
    public function showRegion($slug)
    {
        $region = $this->regionRepository->findBySlug($slug);

        return response()->json(['pesan'=>'berhasil', 'region'=>$region]);
    }

    
    public function index(){
    $package = Package::all();

    return response()->json(['pesan'=>'berhasil', 'package'=>$package]);
    }

   
}
