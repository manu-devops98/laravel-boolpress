<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'admin';
        $newUser->email = 'admin@admin';
        $password = '12345678';
        $newUser->password = Hash::make($password);
        $newUser->save();
        for ($i = 0; $i < 10; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            $password = '12345678';
            $newUser->password = Hash::make($password);
            $newUser->save();
        }
    }
}
