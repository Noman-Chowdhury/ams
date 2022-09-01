<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt(12345678);
        $user1->role = 'admin';
        $user1->save();

        $user2 = new User();
        $user2->name = 'Member';
        $user2->email = 'member@member.com';
        $user2->password = bcrypt(12345678);
        $user2->role = 'member';
        $user2->save();

    }
}
