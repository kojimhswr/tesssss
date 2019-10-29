<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\RegionContract;

class RegionController extends Controller
{
    protected $regionRepository;

    public function __construct(RegionContract $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function show($slug)
    {
        $region = $this->regionRepository->findBySlug($slug);

        return view('site.pages.region', compact('region'));
    }
}