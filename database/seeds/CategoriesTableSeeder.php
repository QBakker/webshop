<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Marvel',
                'image' => 'marvel-brand.jpg',
                'description' => 'Marvel is een onderdeel van disney met veelzijdige actiefiguren.'
            ],
            [
                'name' => 'DC Comics',
                'image' => 'dc-comics.jpg',
                'description' => 'DC Comics is een collectie van superhelden uit de DC universe.'
            ],
            [
                'name' => 'Disney',
                'image' => 'disney.jpg',
                'description' => 'Disney is het grootste bedrijf in de stripfiguren wereld en heeft veel bekende striphelden.'
            ],
            [
                'name' => 'Blizzard',
                'image' => 'blizzard.jpg',
                'description' => 'Blizzard vooral bekend van World of Warcraft en Overwatch heeft een groot bereik rondom de wereld.'
            ],
            [
                'name' => 'Riot Games',
                'image' => 'riot-games.jpg',
                'description' => 'Riot Games, vooral bekend van League of Legends.'
            ],
            
        ]);
    }
}
