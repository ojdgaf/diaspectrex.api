<?php

use Illuminate\Database\Seeder;

use App\Models\Location\Country;
use App\Models\Location\Address;
use App\Models\Hospital;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $ONPUAddress = Address::where([
            'country_id'  => Country::whereName('Ukraine')->firstOrFail()->id,
            'building'    => 1,
            'postal_code' => 65044,
        ])->firstOrFail();

        $diaspectrexClinic = Hospital::whereName('DiaSpectrEx Clinic')->firstOrFail();

        DB::table('users')->insert([
            [
                'email'       => 'support@dx.com',
                'first_name'  => 'Support',
                'middle_name' => 'Support',
                'last_name'   => 'Support',
                'sex'         => 'male',
                'birthday'    => '1970-01-0-1',
                'passport'    => 'AA-000001',
                'address_id'  => $ONPUAddress->id,
                'hospital_id' => $diaspectrexClinic->id,
                'is_present'  => true,
                'hired_at'    => $now,
                'about'       => 'Support',
                'degree'      => null,
                'password'    => Hash::make('secret'),
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'email'       => 'p@dx.com',
                'first_name'  => 'Test',
                'middle_name' => 'Patientable',
                'last_name'   => 'Patient',
                'sex'         => 'male',
                'birthday'    => '2000-01-01',
                'passport'    => 'AA-000003',
                'address_id'  => $ONPUAddress->id,
                'hospital_id' => null,
                'is_present'  => null,
                'hired_at'    => null,
                'about'       => null,
                'degree'      => null,
                'password'    => Hash::make('secret'),
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'email'       => 'e@dx.com',
                'first_name'  => 'Test',
                'middle_name' => 'Employable',
                'last_name'   => 'Employee',
                'sex'         => 'female',
                'birthday'    => '2000-01-01',
                'passport'    => 'AA-000003',
                'address_id'  => $ONPUAddress->id,
                'hospital_id' => $diaspectrexClinic->id,
                'is_present'  => true,
                'hired_at'    => $now,
                'about'       => 'Testable',
                'degree'      => null,
                'password'    => Hash::make('secret'),
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'email'       => 'd@dx.com',
                'first_name'  => 'Test',
                'middle_name' => 'Doctorable',
                'last_name'   => 'Doctor',
                'sex'         => 'female',
                'birthday'    => '2000-01-01',
                'passport'    => 'AA-000004',
                'address_id'  => $ONPUAddress->id,
                'hospital_id' => $diaspectrexClinic->id,
                'is_present'  => true,
                'hired_at'    => $now,
                'about'       => 'Testable',
                'degree'      => 'Candidate of Science',
                'password'    => Hash::make('secret'),
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'email'       => 'h@dx.com',
                'first_name'  => 'Test',
                'middle_name' => 'Headable',
                'last_name'   => 'Head',
                'sex'         => 'male',
                'birthday'    => '2000-01-01',
                'passport'    => 'AA-000005',
                'address_id'  => $ONPUAddress->id,
                'hospital_id' => $diaspectrexClinic->id,
                'is_present'  => true,
                'hired_at'    => $now,
                'about'       => 'Testable',
                'degree'      => 'Master of Science',
                'password'    => Hash::make('secret'),
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
