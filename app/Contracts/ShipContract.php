<?php

namespace App\Contracts;

/**
 * Interface ShipContract
 * @package App\Contracts
 */
interface ShipContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listShips(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findShipById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createShip(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateShip(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteShip($id);
}
