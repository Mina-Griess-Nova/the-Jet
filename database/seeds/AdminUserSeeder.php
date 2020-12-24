<?php

use App\Models\User;
use App\Models\UserTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin= User::create([

            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone'=>'01222222222',

        ]);
        $admin->attachRole('super_admin');

        $admin=UserTranslation::create([
            'user_id'=>'1',
            'locale'=>'ar',
            'name'=>'الادمن',
        ]);
        $admin=UserTranslation::create([
            'user_id'=>'1',
            'locale'=>'en',
            'name'=>'super admin',
        ]);


    }
}
