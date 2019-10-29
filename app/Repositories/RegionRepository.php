<?php

namespace App\Repositories;

use App\Models\Region;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\RegionContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class RegionRepository
 *
 * @package \App\Repositories
 */
class RegionRepository extends BaseRepository implements RegionContract
{
    use UploadAble;

    /**
     * RegionRepository constructor.
     * @param Region $model
     */
    public function __construct(Region $model)
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
    public function listRegions(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findRegionById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Region|mixed
     */
    public function createRegion(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'regions');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $region = new Region($merge->all());

            $region->save();

            return $region;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRegion(array $params)
    {
        $region = $this->findRegionById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($region->image != null) {
                $this->deleteOne($region->image);
            }

            $image = $this->uploadOne($params['image'], 'regions');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $region->update($merge->all());

        return $region;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteRegion($id)
    {
        $region = $this->findRegionById($id);

        if ($region->image != null) {
            $this->deleteOne($region->image);
        }

        $region->delete();

        return $region;
    }

    /**
     * @return mixed
     */
    public function treeList()
    {
        return Region::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
        return Region::with('packages')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}
