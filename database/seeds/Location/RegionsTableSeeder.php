<?php

use Illuminate\Database\Seeder;

use App\Models\Location\Country;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $ukraine = Country::whereName('Ukraine')->firstOrFail();

        $ukraine->regions()->createMany([
            ['name' => 'Cherkasy Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chernihiv Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chernivtsi Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dnipropetrovsk Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Donetsk Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ivano-Frankivsk Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kharkiv Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kherson Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Khmelnytskyi Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kiev Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kirovohrad Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Luhansk Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lviv Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mykolaiv Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Odessa Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Poltava Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rivne Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sumy Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ternopil Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vinnytsia Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Volyn Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zakarpattia Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zaporizhia Oblast', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zhytomyr Oblast', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
