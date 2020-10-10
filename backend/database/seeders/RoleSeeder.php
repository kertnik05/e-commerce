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
            // 'id' => 2,
            'name' => 'customer',
            'description' => 'Customer'
        ]);
        Role::factory()->create([
            // 'id' => 3,
            'name' => 'supplier',
            'description' => 'Supplier'
        ]);
    }
}
