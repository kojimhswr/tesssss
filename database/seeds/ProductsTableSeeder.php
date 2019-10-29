<?php

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'ship_id'          =>  1,
            'duration'               =>  '',
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
