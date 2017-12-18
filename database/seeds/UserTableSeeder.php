<?php
//namespace database\seeds\UserTableSeeder;

//namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder {

    public function run()
    {

        DB::table('users')->delete();

        for($i = 0; $i < 10; ++$i)
        {
            DB::table('users')->insert([
                'name' => 'Nom' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'password' => bcrypt('password' . $i),
                'admin' => rand(0, 1)
            ]);
        }
    }
}