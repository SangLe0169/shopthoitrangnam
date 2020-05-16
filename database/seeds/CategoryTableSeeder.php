<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data =[
            [
                'cate_name'=>'Ao',
                'cate_slug'=>Str::slug('Ao')
            ],
            [
                'cate_name'=>'Quan',
                'cate_slug'=>Str::slug('Quan')
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
