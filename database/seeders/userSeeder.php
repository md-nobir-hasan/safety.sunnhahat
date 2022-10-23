<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n =[
            ['name' => "Md Nobir Hasan",
            'email' => "nobir.wd@gmail.com",
            'phone' => "01518460933",
            'roll' => "super_admin",
            'password' => Hash::make(1518460933),
            ],
            ['name' => "Admin",
            'email' => "admin7890@gmail.com",
            'phone' => "123",
            'roll' => "admin",
            'password' => Hash::make(123456),
            ],
        ];
        DB::table('users')->insert($n);
    }
}
