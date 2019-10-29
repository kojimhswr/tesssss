<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\PackageImage;
use Illuminate\Http\Request;
use App\Contracts\PackageContract;
use App\Http\Controllers\Controller;

class PackageImageController extends Controller
{
    use UploadAble;

    protected $packageRepository;

    public function __construct(PackageContract $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function upload(Request $request)
    {
        $package = $this->packageRepository->findPackageById($request->package_id);

        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'packages');

            $packageImage = new PackageImage([
                'full'      =>  $image,
            ]);

            $package->images()->save($packageImage);
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = PackageImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
