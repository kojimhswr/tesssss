<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'ship_id'          =>  1,
            'sku'               =>  '',
            'name'              =>  '',
            'description'       =>  'This is the root region, don\'t delete this one',
            'quantity'          =>  null,
            'weight'            =>  '',
            'price'             =>  '',
            'sale_price'        =>  '',
            'status'            =>  1,
            'featured'          => 0,
        ]);
    }
}
