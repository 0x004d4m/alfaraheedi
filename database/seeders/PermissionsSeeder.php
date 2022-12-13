<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            ["id"=>1,"name"=>"View Categories","guard_name"=>"web"],
            ["id"=>2,"name"=>"Manage Categories","guard_name"=>"web"],
            ["id"=>3,"name"=>"View Authours","guard_name"=>"web"],
            ["id"=>4,"name"=>"Manage Authours","guard_name"=>"web"],
            ["id"=>5,"name"=>"View Products","guard_name"=>"web"],
            ["id"=>6,"name"=>"Manage Products","guard_name"=>"web"],
            ["id"=>7,"name"=>"View Customers","guard_name"=>"web"],
            ["id"=>8,"name"=>"Manage Customers","guard_name"=>"web"],
            ["id"=>9,"name"=>"View Orders","guard_name"=>"web"],
            ["id"=>10,"name"=>"Manage Orders","guard_name"=>"web"],
            ["id"=>11,"name"=>"View Drivers","guard_name"=>"web"],
            ["id"=>12,"name"=>"Manage Drivers","guard_name"=>"web"],
            ["id"=>13,"name"=>"View Contact Requests","guard_name"=>"web"],
            ["id"=>14,"name"=>"Manage Contact Requests","guard_name"=>"web"],
            ["id"=>15,"name"=>"Manage Authentication","guard_name"=>"web"],
            ["id"=>16,"name"=>"Manage Logs","guard_name"=>"web"],
        ]);

        DB::table('roles')->insert([
            ["id"=>1,"name"=>"Super Admin","guard_name"=>"web"]
        ]);

        DB::table('model_has_roles')->insert([
            ["role_id"=>1,"model_type"=>"App\Models\User","model_id"=>"1"],
        ]);

        DB::table('role_has_permissions')->insert([
            ["permission_id"=>1,"role_id"=>1],
            ["permission_id"=>2,"role_id"=>1],
            ["permission_id"=>3,"role_id"=>1],
            ["permission_id"=>4,"role_id"=>1],
            ["permission_id"=>5,"role_id"=>1],
            ["permission_id"=>6,"role_id"=>1],
            ["permission_id"=>7,"role_id"=>1],
            ["permission_id"=>8,"role_id"=>1],
            ["permission_id"=>9,"role_id"=>1],
            ["permission_id"=>10,"role_id"=>1],
            ["permission_id"=>11,"role_id"=>1],
            ["permission_id"=>12,"role_id"=>1],
            ["permission_id"=>13,"role_id"=>1],
            ["permission_id"=>14,"role_id"=>1],
            ["permission_id"=>15,"role_id"=>1],
            ["permission_id"=>16,"role_id"=>1],
        ]);
    }
}
