<?php

use Illuminate\Database\Seeder;

use App\Models\Location\Region;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $odessaOblast = Region::whereName('Odessa Oblast')->firstOrFail();

        $odessaOblast->cities()->createMany([
            ['name' => 'Ananyiv', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Artsyz', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Balta', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Berezivka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bilhorod-Dnistrovskyi', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bilyayivka', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bolhrad', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chornomorsk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Izmail', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kiliya', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kodyma', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Odessa', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Podilsk', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Reni', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rozdilna', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tatarbunary', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Teplodar', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vylkove', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Yuzhne', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
