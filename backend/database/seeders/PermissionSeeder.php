<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_array = array();
        foreach(Role::all() as $key => $value){
            $role_array[] = $value->id;
        }
        Permission::factory()->times(10)
        ->create();
        // ->each(function($permission) use ($role_array){
        //     $permission->roles()->sync($role_array);
        // });


    }
}
