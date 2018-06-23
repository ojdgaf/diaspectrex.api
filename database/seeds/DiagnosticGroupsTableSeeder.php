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
                'name'            => 'chronic obstructive pulmonary disease',
                'display_name'    => 'Chronic Obstructive Pulmonary Disease',
                'description'     => 'Adults who have chronic obstructive pulmonary disease.',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'tuberculosis',
                'display_name'    => 'Tuberculosis',
                'description'     => 'Adults who have tuberculosis.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'asthma',
                'display_name'    => 'Asthma',
                'description'     => 'Children who have asthma.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'bronchitis',
                'display_name'    => 'Bronchitis',
                'description'     => 'Children who have bronchitis.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'pneumonia',
                'display_name'    => 'Pneumonia',
                'description'     => 'Children who have pneumonia.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'somatoform autonomic dysfunction',
                'display_name'    => 'Somatoform Autonomic Dysfunction',
                'description'     => 'Children who have somatoform autonomic dysfunction.',
            ],
        ]);
    }
}
