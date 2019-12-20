<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = [
            [
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'tim88r@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('timadmin')
            ],
            [
            'name' => 'visitor',
            'role' => 'visitor',
            'email' => 'visitor@visitor.com',
            'email_verified_at' => now(),
            'password' => bcrypt('aaaa')
            ]
        ];
        DB::table('users')->insert($user);
    }
}
