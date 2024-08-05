<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users=[
        //     [
        //         'name'=>'user',
        //         'email'=>'user@gmail.com',
        //         'password'=>bcrypt('123456789'),
        //         'role'=>0
        //     ],
        //     [
        //         'name'=>'admin',
        //         'email'=>'admin@gmail.com',
        //         'password'=>bcrypt('123456789'),
        //         'role'=>1
        //     ],
        //     [
        //         'name'=>'user20',
        //         'email'=>'user20@gmail.com',
        //         'password'=>bcrypt('123456789'),
        //         'role'=>0
        //     ],
        // ];
        // foreach($users as $user){
        //     User::create($user);
        // }
    }
}
