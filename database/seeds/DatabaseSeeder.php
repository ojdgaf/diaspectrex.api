<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountriesTableSeeder::class,
            RegionsTableSeeder::class,
            CitiesTableSeeder::class,
            StreetsTableSeeder::class,
            AddressesTableSeeder::class,

            HospitalsTableSeeder::class,
            PatientTypesTableSeeder::class,
            DiagnosticGroupsTableSeeder::class,
            ClassifiersTableSeeder::class,

            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolePermissionTableSeeder::class,
            UsersTableSeeder::class,
            RoleModelTableSeeder::class,

            SeancesSeeder::class,
            PredictionsSeeder::class,
        ]);
    }
}
