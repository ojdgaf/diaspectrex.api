<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('permissions')->insert([
            # attributes
            [
                'name'       => 'have patient attributes',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have employee attributes',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have doctor attributes',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have head attributes',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            # pages
            [
                'name'       => 'have access to support pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have access to patient pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have access to employee pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have access to doctor pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'have access to head pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            # CRUDs

            # users
            [
                'name'       => 'see user',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'see users',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'create user',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'update user',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'delete user',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'interact with user',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);
    }
}
