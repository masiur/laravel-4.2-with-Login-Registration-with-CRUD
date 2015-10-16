<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeedUsersTableTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();

		$users = [
					[
						'first_name' => 'Emily',
						'last_name' => 'Thorn' ,
						'email' => 'emilythorn@gmail.com',
						'password' => Hash::make('emilythorn')
					],
					[
						'first_name' => 'Masiur',
						'last_name' => 'Siddiki' ,
						'email' => 'mrsiddiki@gmail.com',
						'password' => Hash::make('sust')
					]

				 ];
				 foreach($users as $user) {
				 	User::create($user);
				 }
	}

}