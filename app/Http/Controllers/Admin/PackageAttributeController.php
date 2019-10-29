<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\PackageAttribute;
use App\Http\Controllers\Controller;

class PackageAttributeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function packageAttributes(Request $request)
    {
        $package = Package::findOrFail($request->id);

        return response()->json($package->attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        $packageAttribute = PackageAttribute::create($request->data);

        if ($packageAttribute) {
            return response()->json(['message' => 'Package attribute added successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting package attribute.']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $packageAttribute = PackageAttribute::findOrFail($request->id);
        $packageAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Package attribute deleted successfully.']);
    }
}
