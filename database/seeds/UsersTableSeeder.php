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
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        DB::table('users')->insert([
            [
                'name' => "Radit yat",
                'email' => "radity@test.com",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "dimas yat",
                'email' => "dimasr@test.com",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "sarah yat",
                'email' => "rara@test.com",
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
