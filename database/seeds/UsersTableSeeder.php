<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Admin::truncate();
        DB::table('admin_roles')->truncate();
    	$adminRoles=Roles::where('name','admin')->first();
    	$authorRoles=Roles::where('name','author')->first();
    	$userRoles=Roles::where('name','user')->first();
    

    $admin = Admin::create([
    	'admin_name'=>'haiadmin',
    	'admin_email'=>'ngongochai123@gmail.com',
    	'admin_phone'=>'0969710597',
    	'admin_password'=>md5('123456')
    ]);

    $author = Admin::create([
    	'admin_name'=>'haiauthor',
    	'admin_email'=>'ngongochai123@gmail.com',
    	'admin_phone'=>'0969710597',
    	'admin_password'=>md5('123456')
    ]);

    $user = Admin::create([
    	'admin_name'=>'haiuser',
    	'admin_email'=>'ngongochai123@gmail.com',
    	'admin_phone'=>'0969710597',
    	'admin_password'=>md5('123456')
    ]);

    $admin->roles()->attach($adminRoles);
    $author->roles()->attach($authorRoles);
    $user->roles()->attach($userRoles);

    factory(App\Admin::class,20)->create();
    
    }
}
