<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Models\User;
use app\Models\Package;
use app\Models\Order;


class DashboardController extends Controller
{
    public function index(){

        $user = new User;
        $package = new Package;
        $order = new Order;

    }
}
