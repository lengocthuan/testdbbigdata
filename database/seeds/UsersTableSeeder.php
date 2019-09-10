<?php

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

        $start = strtotime("1990-09-01");
        $end = strtotime("2000-01-31");

        $timestamp1 = mt_rand($start, $end);

        $time_rd = date("Y-m-d", $timestamp1);

        $hashed_random_password = Hash::make(str_random(10));

        for ($i = 0; $i < 5000; $i++) {
            $timestamp = Carbon\Carbon::now();
            $users[] = [
                'username' => str_random(8),
                'email' => str_random(12) . '@mail.com',
                'password' => $hashed_random_password,
                'birthday' => $time_rd,
                'address' => str_random(10),
                'fullname' => str_random(15),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        $chunks = array_chunk($users, 25);
        foreach ($chunks as $chunk) {
            User::insert($users);
        }

        $end_time = microtime(true);
        echo $end_time - $start_time;
    }
}
