<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat sample role
        

         $adminRole = new Role();
         $adminRole->name="admin";
         $adminRole->display_name = "administrator";
         $adminRole->save();

         $memberRole = new Role();
         $memberRole->name="member";
         $memberRole->display_name = "member";
         $memberRole->save();
         
         //membuat sample role

        $admin =  new User();
        $admin->name = 'Admin Penentuan Wisata';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('admin12345');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat sample member
        $member = new User();
        $member->name = "Member Users";
        $member->email = "member@gmail.com";
        $member->password = bcrypt ('rahasia');
        $member->save();
        $member->attachRole($memberRole);


    }
}
