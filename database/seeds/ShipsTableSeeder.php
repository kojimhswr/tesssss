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
            'name'          =>  'Wonder of Alwi',
        ]);

        Ship::create([
            'name'          =>  'Odyssey of Alwi',
        ]);

        Ship::create([
            'name'          =>  'Symphony of Alwi',
        ]);

        Ship::create([
            'name'          =>  'Harmony of Alwi',
        ]);
    }
}
