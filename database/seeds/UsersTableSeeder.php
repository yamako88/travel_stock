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
        //
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'aaaa',
                'email' => 'aaaa@gmail.com',
                'password' => bcrypt('aaaaaa'),
            ],
            [
                'id' => 2,
                'name' => 'bbbb',
                'email' => 'bbbb@gmail.com',
                'password' => bcrypt('bbbbbb'),
            ],
            [
                'id' => 3,
                'name' => 'cccc',
                'email' => 'cccc@gmail.com',
                'password' => bcrypt('cccccc'),
            ]
        ]);
    }
}
