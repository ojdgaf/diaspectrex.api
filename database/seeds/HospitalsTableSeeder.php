<?php

use Illuminate\Database\Seeder;

use App\Models\Location\Country;
use App\Models\Location\Address;

class HospitalsTableSeeder extends Seeder
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

        DB::table('hospitals')->insert([
            [
                'address_id' => $ONPUAddress->id,
                'name'       => 'DiaSpectrEx Clinic',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
