<?php

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
        $now =  now();
        
        DB::table('roles')->insert([
            [
                'name'         => 'support',
                'display_name' => 'Tech Support',
                'guard_name'   => 'api',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'patient',
                'display_name' => 'Patient',
                'guard_name'   => 'api',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'employee',
                'display_name' => 'Employee',
                'guard_name'   => 'api',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'doctor',
                'display_name' => 'Doctor',
                'guard_name'   => 'api',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'head',
                'display_name' => 'Head Doctor',
                'guard_name'   => 'api',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}
