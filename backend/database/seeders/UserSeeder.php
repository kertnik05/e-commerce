<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->hasUserDetail()
            ->hasRoles(1, [
                'name' => 'customer',
                'description' => 'Customer'
            ])
            ->create();
    }
}
