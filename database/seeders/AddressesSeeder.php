<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Addresses;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Addresses::factory(30)->create();
    }
}
