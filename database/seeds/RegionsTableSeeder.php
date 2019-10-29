<?php

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root region, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Region::create([
            'name'          =>  'Asia',
            'description'   =>  'Asia Region',    
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        Region::create([
            'name'          =>  'Europe',
            'description'   =>  'Europe Region',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        Region::create([
            'name'          =>  'America',
            'description'   =>  'America Region',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        
    }
}
