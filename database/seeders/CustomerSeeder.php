<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker; 
class CustomerSeeder extends Seeder
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
            for($i=0; $i<30; $i++) {
                DB::table('customers')->insert([
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'city' => $faker->city(),
                    'postal_code' => $faker->postcode(),
                    'address' => $faker->streetAddress(),
                    'country_code' => $country->code,
                    'email' => $faker->email(),
                    'phone' => $faker->e164PhoneNumber(),
                    'created_at' =>  \Carbon\Carbon::now(),
                ]);
            }
        }

    }
}
