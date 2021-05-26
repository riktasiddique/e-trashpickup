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
        // 
        // $role = new Role();
        // $role->name = "Super Admin";
        // $role->save();

        $data = [
            [
                'name'=> 'Super Admin',
                'created_at'=>now()->toDateTimeString()
            ],
            [
                'name'=> 'Admin',
                'created_at'=>now()->toDateTimeString()
            ],
            [
                'name'=> 'Customer',
                'created_at'=>now()->toDateTimeString()
            ]
        ];
       Role::insert($data);
    }
}
