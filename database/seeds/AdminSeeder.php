<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Base\Constants\Auth\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password= 123456789;
        $mobile = 7708098734;
        
        $users = User::all();

        if(sizeof($users)==0){
           $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'mobile' => $mobile,
            'mobile_confirmed' => true,
        ]);
        $user->attachRole(Role::ADMIN);
           
        }
		

    }
}
