<?php

namespace App\Repositories;

use App\Models\Ship;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ShipContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class RegionRepository
 *
 * @package \App\Repositories
 */
class ShipRepository extends BaseRepository implements ShipContract
{
    use UploadAble;

    /**
     * RegionRepository constructor.
     * @param Ship $model
     */
    public function __construct(Ship $model)
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
    public function listShips(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findShipById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Ship|mixed
     */
    public function createShip(array $params)
    {
        try {
            $collection = collect($params);

            $logo = null;

            if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {
                $logo = $this->uploadOne($params['logo'], 'ships');
            }

            $merge = $collection->merge(compact('logo'));

            $ship = new Ship($merge->all());

            $ship->save();

            return $ship;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateShip(array $params)
    {
        $ship = $this->findShipById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {

            if ($ship->logo != null) {
                $this->deleteOne($ship->logo);
            }

            $logo = $this->uploadOne($params['logo'], 'ships');
        }

        $merge = $collection->merge(compact('logo'));

        $ship->update($merge->all());

        return $ship;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteShip($id)
    {
        $ship = $this->findShipById($id);

        if ($ship->logo != null) {
            $this->deleteOne($ship->logo);
        }

        $ship->delete();

        return $ship;
    }
}
