<?php

namespace Database\Seeders;

use App\Models\CheckoutDetail;
use Illuminate\Database\Seeder;

class CheckoutDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckoutDetail::factory()->count(10)->create();
    }
}
