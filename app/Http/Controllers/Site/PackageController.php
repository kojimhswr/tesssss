<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Contracts\PackageContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class PackageController extends Controller
{
    protected $attributeRepository;
    protected $packageRepository;

    public function __construct(PackageContract $packageRepository, AttributeContract $attributeRepository)
    {
        $this->packageRepository = $packageRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $package = $this->packageRepository->findPackageBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.package', compact('package', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        $package = $this->packageRepository->findPackageById($request->input('packageId'));
        $options = $request->except('_token', 'packageId', 'price', 'qty');

        Cart::add(uniqid(), $package->name, $request->input('price'), $request->input('qty'), $options);

        return redirect('/cart')->with('message', 'Item added to cart successfully.');
    }
}