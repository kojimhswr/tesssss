<?php

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = ['Interior', 'Ocean View', 'Suites'];

        foreach ($rooms as $room)
        {
            AttributeValue::create([
                'attribute_id'      =>  1,
                'value'             =>  $room,
                'price'             =>  null,
            ]);
        }
    }
}
