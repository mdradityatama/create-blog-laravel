<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        $faker = Factory::create();

        DB::table('users')->insert([
            [
                'name' => "Radit yat",
                'slug' => 'radit-yat',
                'email' => "radity@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => "dimas yat",
                'slug' => 'dimas-yat',
                'email' => "dimasr@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => "sarah yat",
                'slug' => 'sarah-yat',
                'email' => "rara@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
        ]);
    }
}
