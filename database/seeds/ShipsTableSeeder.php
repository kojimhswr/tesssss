<?php

use App\Models\Ship;
use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ship::create([
            'name'          =>  'Adidas',
        ]);

        Ship::create([
            'name'          =>  'Vans',
        ]);

        Ship::create([
            'name'          =>  'Nike',
        ]);

        Ship::create([
            'name'          =>  'Puma',
        ]);
    }
}
