<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Quinten Bakker',
                'email' => '99047215@mydavinci.nl',
                'password' => bcrypt('wachtwoord')
            ]
        ]);
    }
}
