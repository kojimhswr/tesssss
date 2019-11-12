<?php
namespace App\Repositories;
use App\Models\Package;
use App\Models\Itinerary;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\PackageContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
/**
 * Class PackageRepository
 *
 * @package \App\Repositories
 */
class PackageRepository extends BaseRepository implements PackageContract
{
    use UploadAble;
    /**
     * PackageRepository constructor.
     * @param Package $model
     */
    public function __construct(Package $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listPackages(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findPackageById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }
    /**
     * @param array $params
     * @return Package|mixed
     */
    public function createPackage(array $params)
    {
        try {
            $collection = collect($params);
            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;
            $merge = $collection->merge(compact('status', 'featured'));
            $package = new Package($merge->all());
            $package->save();
            if ($collection->has('regions')) {
                $package->regions()->sync($params['regions']);
            }
            return $package;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    /**
     * @param array $params
     * @return mixed
     */
    public function updatePackage(array $params)
    {
        $package = $this->findPackageById($params['package_id']);
        $collection = collect($params)->except('_token');
        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;
        $merge = $collection->merge(compact('status', 'featured'));
        $package->update($merge->all());
        if ($collection->has('regions')) {
            $package->regions()->sync($params['regions']);

    }
        return $package;
    }
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deletePackage($id)
    {
        $package = $this->findPackageById($id);
        $package->delete();
        return $package;
    }
    /**
     * @param $slug
     * @return mixed
     */
    public function findPackageBySlug($slug)
    {
        $package = Package::where('slug', $slug)->with('images')->first();
        return $package;
    }
}