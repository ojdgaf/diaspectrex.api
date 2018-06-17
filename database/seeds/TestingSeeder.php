<?php

use Illuminate\Database\Seeder;
use App\Models\PatientType;

class TestingSeeder extends Seeder
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

        DB::table('patient_cards')->insert([
            [
                'id'              => 1,
                'code'            => 'C1',
                'patient_id'      => 3,
                'patient_type_id' => $child->id,
                'is_active'       => 0,
                'created_at'      => '1996-01-01 00:00:00',
                'updated_at'      => '2008-01-01 00:00:00',
            ],
            [
                'id'              => 2,
                'code'            => 'A1',
                'patient_id'      => 3,
                'patient_type_id' => $adult->id,
                'is_active'       => 1,
                'created_at'      => '2010-01-01 00:00:00',
                'updated_at'      => '2018-01-01 00:00:00',
            ],
        ]);

        DB::table('examinations')->insert([
            [
                'id'              => 1,
                'patient_card_id' => 1,
                'name'            => 'test child',
                'started_at'      => '1998-01-01 00:00:00',
                'ended_at'        => '1998-01-02 00:00:00',
            ],
            [
                'id'              => 2,
                'patient_card_id' => 1,
                'name'            => 'test child 2',
                'started_at'      => '2003-01-01 00:00:00',
                'ended_at'        => '2003-01-02 00:00:00',
            ],
            [
                'id'              => 3,
                'patient_card_id' => 2,
                'name'            => 'test adult',
                'started_at'      => '2015-01-01 00:00:00',
                'ended_at'        => '2015-01-02 00:00:00',
            ],
            [
                'id'              => 4,
                'patient_card_id' => 2,
                'name'            => 'test adult 2',
                'started_at'      => '2018-01-01 00:00:00',
                'ended_at'        => null,
            ],
        ]);

        DB::table('seances')->insert([
            [
                'id'             => 1,
                'examination_id' => 1,
                'doctor_id'      => 5,
                'started_at'     => '1998-01-01 10:00:00',
                'updated_at'     => '1998-01-01 12:00:00',
                'ended_at'       => '1998-01-01 12:00:00',
            ],
            [
                'id'             => 2,
                'examination_id' => 2,
                'doctor_id'      => 5,
                'started_at'     => '2003-01-01 10:00:00',
                'updated_at'     => '2003-01-01 12:00:00',
                'ended_at'       => '2003-01-01 12:00:00',
            ],
            [
                'id'             => 3,
                'examination_id' => 3,
                'doctor_id'      => 6,
                'started_at'     => '2015-01-01 10:00:00',
                'updated_at'     => '2015-01-01 12:00:00',
                'ended_at'       => '2015-01-01 12:00:00',
            ],
            [
                'id'             => 4,
                'examination_id' => 4,
                'doctor_id'      => 6,
                'started_at'     => '2018-01-01 10:00:00',
                'updated_at'     => '2018-01-01 10:00:00',
                'ended_at'       => null,
            ],
        ]);
    }
}
