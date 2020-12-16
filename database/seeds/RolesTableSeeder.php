<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin= Role::create([
            'name'=>'super_admin',
            'display_name'=>'super admin',
            'description'=>'can do any thing in the project'
        ]);

        $admin =Role::create(['name'=>'admin',
            'display_name'=>'admin',
            'description'=>'can add cook and cusines'
        ]);

        $cook=Role::create(['name'=>'cook',
            'display_name'=>'cook',
            'description'=>'can add dishes'
        ]);

        $customer=Role::create([
            'name'=>'customer',
            'display_name'=>'customer',
            'description'=>'can make order'
        ]);
    }
}
