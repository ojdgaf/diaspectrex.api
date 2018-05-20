<?php

use Illuminate\Database\Seeder;

use App\Models\Location\Country;
use App\Models\Location\Region;
use App\Models\Location\City;
use App\Models\Location\Street;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('addresses')->insert([
            # Odessa National Polytechnic University
            [
                'country_id'  => Country::whereName('Ukraine')->firstOrFail()->id,
                'region_id'   => Region::whereName('Odessa Oblast')->firstOrFail()->id,
                'city_id'     => City::whereName('Odessa')->firstOrFail()->id,
                'street_id'   => Street::whereName('Shevchenka Ave')->firstOrFail()->id,
                'building'    => 1,
                'postal_code' => 65044,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
