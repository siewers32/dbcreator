<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker; 


class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = DB::table('cities')->get();
        foreach($cities as $city) {
            $faker = \Faker\Factory::create($city->country_code);
            for($i=0; $i<10; $i++) {
                $year = random_int(2022, 2024);
                $month = random_int(1,12);
                $day = random_int(1,28);
                $timezone = $faker->timezone();
                $number_of_days = $faker->randomElement([3,5,10,14,17,21,28]);
                $departure_date = \Carbon\Carbon::createFromDate($year, $month, $day, $timezone);
                $price = $number_of_days * random_int(100,130);
                DB::table('trips')->insert([
                    'city_id' => $city->id,
                    'departure_date' => $departure_date,
                    'number_of_days' => $number_of_days,
                    'price' => $price,
                    'created_at' =>  \Carbon\Carbon::now(),
                ]);
            }
        }

    }
}
