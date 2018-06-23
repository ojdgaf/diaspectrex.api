<?php

use Illuminate\Database\Seeder;
use App\Models\PatientType;

class ClassifiersTableSeeder extends Seeder
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

        DB::table('classifiers')->insert([
            [
                'patient_type_id' => $adult->id,
                'name'            => 'doctor',
                'display_name'    => 'Doctor',
                'description'     => 'Classification made by a doctor manually for adults.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'doctor',
                'display_name'    => 'Doctor',
                'description'     => 'Classification made by a doctor manually for children.',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'aws machine learning',
                'display_name'    => 'AWS Machine Learning',
                'description'     => 'Remote neural network with high level of preciseness. Adjusted for adults.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'aws machine learning',
                'display_name'    => 'AWS Machine Learning',
                'description'     => 'Remote neural network with high level of preciseness. Adjusted for children.',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'discriminant analysis',
                'display_name'    => 'Discriminant Analysis',
                'description'     => 'Math statistical method. Adjusted for adults.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'discriminant analysis',
                'display_name'    => 'Discriminant Analysis',
                'description'     => 'Math statistical method. Adjusted for children.',
            ],
            [
                'patient_type_id' => $adult->id,
                'name'            => 'k-nearest neighbors',
                'display_name'    => 'K-nearest neighbors',
                'description'     => 'Math non-parametric method. Adjusted for adults.',
            ],
            [
                'patient_type_id' => $child->id,
                'name'            => 'k-nearest neighbors',
                'display_name'    => 'K-nearest neighbors',
                'description'     => 'Math non-parametric method. Adjusted for children.',
            ],
        ]);
    }
}
