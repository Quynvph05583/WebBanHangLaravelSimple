<?php

use Illuminate\Database\Seeder;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
               'cate_name' => 'Iphone',
               'cate_slug' => str_slug('Iphone')
            ],
            [
                'cate_name' => 'Android',
                'cate_slug' => str_slug('Android')
            ],
        ];
        //
       DB::table('vp_category')->insert($data);
    }
}
