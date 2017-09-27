<?php

use Illuminate\Database\Seeder;
use App\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['id' => '1', 'name' => 'Karnataka']);
        State::create(['id' => '2', 'name' => 'Telangana']);
        State::create(['id' => '3', 'name' => 'Tamil Nadu']);
    }
}
