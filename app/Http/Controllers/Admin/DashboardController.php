<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Models\User;
use app\Models\Product;
use app\Models\Order;


class DashboardController extends Controller
{
    public function index(){

        $user = new User;
        $product = new Product;
        $order = new Order;

    }
}
