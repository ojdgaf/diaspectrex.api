<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $support  = Role::whereName('support')->firstOrFail();
        $patient  = Role::whereName('patient')->firstOrFail();
        $employee = Role::whereName('employee')->firstOrFail();
        $doctor   = Role::whereName('doctor')->firstOrFail();
        $head     = Role::whereName('head')->firstOrFail();

        $support->syncPermissions(Permission::all()->pluck('name'));

        $patient->syncPermissions([
            'have patient attributes',

            'have access to patient pages'
        ]);

        $employee->syncPermissions([
            'have employee attributes',

            'have access to employee pages',

            'see user', 'see users', 'create user', 'update user', 'interact with user',
        ]);

        $doctor->syncPermissions([
            'have employee attributes', 'have doctor attributes',

            'have access to employee pages', 'have access to doctor pages',

            'see user', 'see users', 'create user', 'update user', 'delete user', 'interact with user',
        ]);

        $head->syncPermissions([
            'have employee attributes', 'have doctor attributes', 'have head attributes',

            'have access to employee pages', 'have access to doctor pages',
            'have access to head pages',

            'see user', 'see users', 'create user', 'update user', 'delete user', 'interact with user',
        ]);
    }
}
