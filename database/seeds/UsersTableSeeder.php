<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_time = microtime(true);

        session_start();

        // $faker = Faker::create();
        // $users = [];
        //Start point of our date range.
        $start = strtotime("2000-09-01");

//End point of our date range.
        $end = strtotime("2009-01-31");

//Custom range.
        $timestamp1 = mt_rand($start, $end);

//Print it out.
        $time_rd = date("Y-m-d", $timestamp1);

        $hashed_random_password = Hash::make(str_random(10));

        foreach (range(1, 5000) as $index) {
            $timestamp = Carbon\Carbon::now();
            $users[] = [
                'username' => str_random(8),
                'email' => str_random(12) . '@mail.com',
                'password' => $hashed_random_password, // password
                'birthday' => $time_rd,
                'address' => str_random(10),
                'fullname' => str_random(15),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        $chunks = array_chunk($users, 50);
        foreach ($chunks as $chunk) {
            User::insert($users);
        }
        // for ($i = 0; $i < 100000; $i++) {
        //     User::create([
        //         'name' => str_random(8),
        //         'email' => str_random(12) . '@mail.com',
        //         'password' => bcrypt('123456'),

        //         'username' => $faker->userName(),
        //         'email' => $faker->email(),
        //         'password' => $hashed_random_password, // password
        //         'birthday' => $faker->dateTimeThisDecade($max = 'now', $timezone = 'Asia/Ho_Chi_Minh'),
        //         'address' => $faker->address(),
        //         'fullname' => $faker->name($gender = 'male' | 'female'),
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp,
        //     ]);
        // }

        $end_time = microtime(true);

        echo $end_time - $start_time;

        // $hashed_random_password = Hash::make(str_random(10));

        // $faker = Faker::create();
        // $users = [];

        // $password = bcrypt('password');

        // for ($i = 0; $i < 8000; $i++) {
        //     $timestamp = Carbon\Carbon::now();
        //     $users[] = [
        //         'username' => $faker->userName(),
        //         'email' => $faker->email(),
        //         'password' => $password, // password
        //         'birthday' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        //         'address' => $faker->address(),
        //         'fullname' => $faker->name($gender = 'male' | 'female'),
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp,
        //     ];
        // }

        // $chunks = array_chunk($users, 50);

        // foreach ($chunks as $chunk) {
        //     User::insert($users);
        // }

    }
}
