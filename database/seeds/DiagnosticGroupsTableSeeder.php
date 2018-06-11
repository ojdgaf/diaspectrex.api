<?php

use Illuminate\Database\Seeder;
use App\Models\PatientType;

class DiagnosticGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adult = PatientType::whereName('adult')->firstOrFail();
        $child = PatientType::whereName('child')->firstOrFail();

        DB::table('diagnostic_groups')->insert([
            [
                'patient_type_id' => $adult->id,
                'name'            => 'standard',
                'display_name'    => 'Standard (healthy)',
                'description'     => 'Adults without any identified diseases.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'standard',
                'display_name'    => 'Standard (healthy)',
                'description'     => 'Children without any identified diseases.',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'bronchitis',
                'display_name'    => 'Bronchitis',
                'description'     => 'Adults who have bronchitis',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'bronchitis',
                'display_name'    => 'Bronchitis',
                'description'     => 'Children who have bronchitis',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'pneumonia',
                'display_name'    => 'Pneumonia',
                'description'     => 'Adults who have pneumonia',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'pneumonia',
                'display_name'    => 'Pneumonia',
                'description'     => 'Children who have pneumonia',
            ],
        ]);
    }
}
