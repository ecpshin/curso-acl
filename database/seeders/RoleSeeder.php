<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->create([
            'name' => 'Superadmin'
        ]);

        $admin = Role::query()->create([
           'name' => "Admin"
        ]);

        $admin->permissions()->attach([1,2,3,4,5,6,7,8]);

        $user = Role::query()->create([
           'name' => 'User'
        ]);

        $user->permissions()->attach(4);

        $author = Role::query()->create([
           'name' => 'Author'
        ]);

        $author->permissions()->attach([1,2,3,4]);

    }
}
