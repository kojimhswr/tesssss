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
            'description'   =>  'Men Shoes',    
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        Region::create([
            'name'          =>  'Europe',
            'description'   =>  'Women Shoes',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        Region::create([
            'name'          =>  'America',
            'description'   =>  'Kids Shoes',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);

        
    }
}
