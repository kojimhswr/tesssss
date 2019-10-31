<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code'          =>  'room',
            'name'          =>  'Room',
            'frontend_type' =>  'select',
            'is_filterable' =>  1,
            'is_required'   =>  1,
        ]);

        Attribute::create([
            'code'          =>  'meal',
            'name'          =>  'Meal Set',
            'frontend_type' =>  'select',
            'is_filterable' =>  1,
            'is_required'   =>  1,
        ]);
    }
}
