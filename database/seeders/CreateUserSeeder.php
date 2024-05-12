<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = [

            [

                'nip'=>'1234',
                'nama'=>'Doni',
                'jabatan'=>'Direktur',
                'email'=>'doni@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'direktur',


            ],



            [

                'nip'=>'1235',
                'nama'=>'Dono',
                'jabatan'=>'Finance',
                'email'=>'dono@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'finance',


            ],
            [

                'nip'=>'1236',
                'nama'=>'Dona',
                'jabatan'=>'Staff',
                'email'=>'dona@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'staff',


            ],

        ];


        foreach ($user as $user) {

            User::create($user);
        }
    }
}
