<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $trips = DB::table('trips')->get();
        $customers = DB::table('customers')->count();
        //Sla een willekeurig aantal trips over zodat niet alle trips een keer geboekt zijn
        $number_of_trips = count($trips);
        $number_of_unbooked_trips = floor($number_of_trips * 0.05); // 5% is niet geboekt
        $unbooked = [];
        while(count($unbooked) <= $number_of_unbooked_trips) {
            $skip = random_int(1, $number_of_trips);
            if(!in_array($skip, $unbooked)) {
                $unbooked[] = $skip;
            }
        }
        foreach($trips as $trip) {
            $reservations = random_int(1,5);

            if(!in_array($trip->id, $unbooked)) {
                for($i=0;$i<$reservations;$i++){
                    $reservation_date = \Carbon\Carbon::parse($trip->departure_date);
                    $beforeReservation = random_int(7,60);
                    $reservation_date->subDays($beforeReservation);
                    DB::table('reservations')->insert([
                        'trip_id' => $trip->id,
                        'customer_id' => random_int(1, $customers),
                        'reservation_date' => $reservation_date,
                        'number_of_adults' => random_int(1,4),
                        'number_of_children' => $faker->randomElement([0,0,0,0,1,1,2,2,3,4]),
                        'paid' => $faker->randomElement([null,$trip->price, floor(0.25 * $trip->price),floor(0.5 * $trip->price),floor(0.75 * $trip->price)]),
                        'created_at' =>  \Carbon\Carbon::now(),
                    ]);                
                }                
            }   

        }

    }
}
