<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create();
        Role::factory()->create([
            'name' => 'customer',
            'description' => 'Customer'
        ]);
        Role::factory()->create([
            'name' => 'supplier',
            'description' => 'Supplier'
        ]);
    }
}
