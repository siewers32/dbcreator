<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            'da_DK' => 'Denemarken', 
            'nl_NL' => 'Nederland', 
            'no_NO' => 'Noorwegen', 
            'pl_PL' => 'Polen', 
            'de_DE' => 'Duitsland', 
            'el_GR' => 'Griekenland', 
            'en_GB' => 'Groot Brittanië',
            'es_ES' => 'Spanje',
            'fi_FI' => 'Finland',
            'sv_SE' => 'Zweden',
            'it_IT' => 'Italië'
        );
        foreach($countries as $code => $country) {
            DB::table('countries')->insert([
                'code' => $code,
                'description' => $country,
                'created_at' =>  \Carbon\Carbon::now(),
            ]);
        }
    }
}
