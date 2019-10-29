<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ShipContract;
use App\Http\Controllers\BaseController;

class ShipController extends BaseController
{
    /**
     * @var ShipContract
     */
    protected $shipRepository;

    /**
     * RegionController constructor.
     * @param ShipContract $shipRepository
     */
    public function __construct(ShipContract $shipRepository)
    {
        $this->shipRepository = $shipRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ships = $this->shipRepository->listShips();

        $this->setPageTitle('Ships', 'List of all ships');
        return view('admin.ships.index', compact('ships'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Ships', 'Create Ship');
        return view('admin.ships.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $ship = $this->shipRepository->createShip($params);

        if (!$ship) {
            return $this->responseRedirectBack('Error occurred while creating ship.', 'error', true, true);
        }
        return $this->responseRedirect('admin.ships.index', 'Ship added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $ship = $this->shipRepository->findShipById($id);

        $this->setPageTitle('Ships', 'Edit Ship : '.$ship->name);
        return view('admin.ships.edit', compact('ship'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $ship = $this->shipRepository->updateShip($params);

        if (!$ship) {
            return $this->responseRedirectBack('Error occurred while updating ship.', 'error', true, true);
        }
        return $this->responseRedirectBack('Ship updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $ship = $this->shipRepository->deleteShip($id);

        if (!$ship) {
            return $this->responseRedirectBack('Error occurred while deleting ship.', 'error', true, true);
        }
        return $this->responseRedirect('admin.ships.index', 'Ship deleted successfully' ,'success',false, false);
    }
}
