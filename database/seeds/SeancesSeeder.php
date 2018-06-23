<?php

use Illuminate\Database\Seeder;
use App\Models\PatientType;
use App\Models\User;

class SeancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $support = User::findOrFail(1);
        $adult   = PatientType::whereName('adult')->firstOrFail();
        $child   = PatientType::whereName('child')->firstOrFail();

        DB::table('patient_cards')->insert([
            [
                'id'              => 1,
                'code'            => 'C1',
                'patient_id'      => $support->id,
                'patient_type_id' => $child->id,
                'is_active'       => 0,
                'created_at'      => '2000-01-01 00:00:00',
                'updated_at'      => '2018-01-01 00:00:00',
            ],
            [
                'id'              => 2,
                'code'            => 'A1',
                'patient_id'      => $support->id,
                'patient_type_id' => $adult->id,
                'is_active'       => 1,
                'created_at'      => '2018-01-01 00:00:00',
                'updated_at'      => '2018-01-01 00:00:00',
            ],
        ]);

        DB::table('examinations')->insert([
            [
                'id'              => 1,
                'patient_card_id' => 1,
                'name'            => 'Database seeding',
                'started_at'      => '2000-01-01 00:00:00',
                'ended_at'        => '2000-01-01 01:00:00',
            ],
            [
                'id'              => 2,
                'patient_card_id' => 2,
                'name'            => 'Database seeding',
                'started_at'      => '2018-01-01 00:00:00',
                'ended_at'        => '2018-01-01 01:00:00',
            ],
        ]);

        DB::table('seances')->insert([
            [
                'id'             => 1,
                'examination_id' => 1,
                'doctor_id'      => $support->id,
                'notes'          => 'Database seeding',
                'started_at'     => '2000-01-01 01:00:00',
                'updated_at'     => '2000-01-01 01:00:00',
                'ended_at'       => '2000-01-01 01:00:00',
            ],
            [
                'id'             => 2,
                'examination_id' => 2,
                'doctor_id'      => $support->id,
                'notes'          => 'Database seeding',
                'started_at'     => '2018-01-01 01:00:00',
                'updated_at'     => '2018-01-01 01:00:00',
                'ended_at'       => '2018-01-01 01:00:00',
            ],
        ]);
    }
}
