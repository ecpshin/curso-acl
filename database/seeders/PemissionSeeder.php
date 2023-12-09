<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PemissionSeeder extends Seeder
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
            ['name' => 'post_update'],
            ['name' => 'post_view'],
            ['name' => 'user_create'],
            ['name' => 'user_delete'],
            ['name' => 'user_update'],
            ['name' => 'user_view']
        ]);
    }
}
