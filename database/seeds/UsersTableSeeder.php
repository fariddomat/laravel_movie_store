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
        $user=User::create([
            'name'=>'Super Admin',
            'email'=>'admin@movie.com',
            'password'=>bcrypt('admin'),
        ]);
        $user->attachRole('super_admin');

        $user2=User::create([
            'name'=>'Admin',
            'email'=>'admin2@movie.com',
            'password'=>bcrypt('admin2'),
        ]);
        $user2->attachRole('admin');

        $user3=User::create([
            'name'=>'user',
            'email'=>'php',
            'password'=>bcrypt('user'),
        ]);
        $user3->attachRole('user');
    }
}
