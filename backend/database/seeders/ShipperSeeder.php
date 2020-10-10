<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipper;
class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Shipper::factory()->times(10)->create();

    }
}
