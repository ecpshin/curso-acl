<?php

namespace Database\Seeders;

//use App\Models\Permission;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([
            ['name' => 'post_create'],
            ['name' => 'post_delete'],
            ['name' => 'post_edit'],
            ['name' => 'post_update'],
            ['name' => 'post_view'],
            ['name' => 'user_create'],
            ['name' => 'user_delete'],
            ['name' => 'user_edit'],
            ['name' => 'user_update'],
            ['name' => 'user_view']
        ]);


    }
}
