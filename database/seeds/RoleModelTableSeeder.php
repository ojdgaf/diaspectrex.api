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
        $burdeinyi = User::whereEmail('bu@dx.com')->firstOrFail();
        $dubovoy   = User::whereEmail('du@dx.com')->firstOrFail();
        $patient   = User::whereEmail('p@dx.com')->firstOrFail();
        $employee  = User::whereEmail('e@dx.com')->firstOrFail();
        $doctor    = User::whereEmail('d@dx.com')->firstOrFail();
        $head      = User::whereEmail('h@dx.com')->firstOrFail();

        $burdeinyi->syncRoles(['support']);
        $dubovoy->syncRoles(['support']);
        $patient->syncRoles(['patient']);
        $employee->syncRoles(['employee']);
        $doctor->syncRoles(['doctor']);
        $head->syncRoles(['head']);
    }
}
