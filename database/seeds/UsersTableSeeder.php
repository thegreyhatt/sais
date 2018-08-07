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
        $user = new User;
        $user->name = "John Doe";
        $user->username = "admin";
        $user->password = Hash::make("xadmin");
        $user->account_type = 1;
        $user->save();
    }
}
