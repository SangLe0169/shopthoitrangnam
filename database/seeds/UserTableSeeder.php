<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email'=>'sprol878@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>1
            ],
        ];
        DB::table('vp_users')->insert($data);
    }
}
