<?php

use App\Models\User;
use App\Models\UserTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer= User::create([
            'name' => 'otbokhly',
            'email' => 'info@otbokhly.com',
            'password' => Hash::make('test1234'),
            'phone'=>'01111111111',
        ]);
        $customer->attachRole('customer');
        $customer=UserTranslation::create([
            'user_id'=>'2',
            'locale'=>'ar',
            'name'=>'otbokhly',
        ]);

    }
}
