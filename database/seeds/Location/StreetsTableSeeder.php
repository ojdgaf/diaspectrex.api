<?php

use Illuminate\Database\Seeder;

use App\Models\Location\City;

class StreetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $odessa = City::whereName('Odessa')->firstOrFail();

        $odessa->streets()->createMany([
            ['name' => 'Derybasivska', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hrets\'ka,', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bunina', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zhukovs\'koho', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Yevreis\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Troitska', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Uspenska', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bazarna', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Velyka Arnauts\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mala Arnauts\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Panteleimonivs\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Osypova', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pushkins\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rishelievska', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Katerynyns\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Oleksandrivs\'kyi Ave', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Preobrazhens\'ka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zaslavs\'koho', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shevchenka Ave', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
