<?php

use Illuminate\Database\Seeder;

class PatientTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_types')->insert([
            [
                'name'         => 'adult',
                'display_name' => 'Adults',
            ],
            [
                'name'         => 'child',
                'display_name' => 'Children',
            ],
        ]);
    }
}
