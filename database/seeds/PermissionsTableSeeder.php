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
                'name'       => 'be support',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'be patient',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'be employee',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'be doctor',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'be head',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            # pages
            [
                'name'       => 'access support pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'access patient pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'access employee pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'access doctor pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'access head pages',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            # CRUDs

            # users
            [
                'name'       => 'see users',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'manage supports',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'manage patients',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'manage employees',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'manage doctors',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'manage heads',
                'guard_name' => 'api',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
