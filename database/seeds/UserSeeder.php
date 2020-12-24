<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        //admin user
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('admin')
        ]);
        //member user
        for($i = 0; $i < 5; $i++){
            DB::table('users')->insert([
                'role_id' => 2,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testuser' . ($i+1))
            ]);
        }
    }
}
