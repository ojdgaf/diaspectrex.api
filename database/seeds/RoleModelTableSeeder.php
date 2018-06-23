<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class RoleModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $support  = User::whereEmail('support@dx.com')->firstOrFail();
        $patient  = User::whereEmail('p@dx.com')->firstOrFail();
        $employee = User::whereEmail('e@dx.com')->firstOrFail();
        $doctor   = User::whereEmail('d@dx.com')->firstOrFail();
        $head     = User::whereEmail('h@dx.com')->firstOrFail();

        $support->syncRoles(['support']);
        $patient->syncRoles(['patient']);
        $employee->syncRoles(['employee']);
        $doctor->syncRoles(['doctor']);
        $head->syncRoles(['head']);
    }
}
