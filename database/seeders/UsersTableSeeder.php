<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=array(
            array(
                'name'=>'Basant Raj Joshi',
                'email'=>'joshi@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'Biraj Bhatt',
                'email'=>'bhatt@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'Virat Kholi',
                'email'=>'kholi@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'reporter',
                'status'=>'active'
            ),
            array(
                'name'=>'Ramesh Bohara',
                'email'=>'bohora@gmail.com',
                'password'=>Hash::make('admin123'),
                'role'=>'reporter',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($array);


    }
}
