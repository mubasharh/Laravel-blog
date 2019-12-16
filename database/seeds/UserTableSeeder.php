<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Nadeem Ahmed',
        	'email' => 'nadeem@gmail.com',
        	'password' => bcrypt('1234'),
        	'admin' => 1
        ]);


        $profile = Profile::create([
        	'user_id' => $user->id,
        	'avatar' => 'uploads/users/nadeem.jpg',
        	'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat explicabo minus laudantium cum nostrum, voluptatum consectetur optio ex itaque possimus quo, aliquid voluptate rem, natus blanditiis praesentium, laboriosam quibusdam sint',
        	'facebook' => 'facebook.com',
        	'youtube' => 'youtube.com'
        ]);
    }
}
