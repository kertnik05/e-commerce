<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ShipperSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CheckoutSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\PaymentTypeSeeder;
use Database\Seeders\CheckoutDetailSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            PaymentTypeSeeder::class,
            ShipperSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CheckoutSeeder::class,
            OrderSeeder::class,
            CheckoutDetailSeeder::class,
        ]);
    }
}
