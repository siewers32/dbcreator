<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker; 

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = DB::table('countries')->get();
        foreach($countries as $country) {
            //$class =  "Faker\\Provider\\".$country->code."\\Address";
            $faker =Faker\Factory::create($country->code);
            for($i=0; $i<10; $i++) {
                DB::table('cities')->insert([
                    'country_code' => $country->code,
                    'description' => $faker->city(),
                    'created_at' =>  \Carbon\Carbon::now(),
                ]);
            }
        }
    }
}
