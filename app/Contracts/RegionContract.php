<?php

namespace App\Contracts;

/**
 * Interface RegionContract
 * @package App\Contracts
 */
interface RegionContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRegions(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findRegionById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createRegion(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRegion(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteRegion($id);

    /**
     * @return mixed
    */
    public function treeList();


    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
    }
