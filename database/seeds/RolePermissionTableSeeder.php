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
            'be patient',

            'access patient pages',

            'see users'
        ]);

        $employee->syncPermissions([
            'be employee',

            'access employee pages',

            'see users', 'manage patients', 'manage employees',
        ]);

        $doctor->syncPermissions([
            'be employee', 'be doctor',

            'access employee pages', 'access doctor pages',

            'see users', 'manage patients', 'manage employees', 'manage doctors'
        ]);

        $head->syncPermissions([
            'be employee', 'be doctor', 'be head',

            'access employee pages', 'access doctor pages', 'access head pages',

            'see users', 'manage patients', 'manage employees', 'manage doctors', 'manage heads'
        ]);
    }
}
