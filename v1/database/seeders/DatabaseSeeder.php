<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::table('users')->insert([
            'name' => 'bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1,
            'created_at' => $time,
            'updated_at' => $time
        ]);
        DB::table('users')->insert([
            'name' => 'dev',
            'email' => 'dev@dev.dev',
            'password' => Hash::make('dev'),
            'role' => 10,
            'created_at' => $time,
            'updated_at' => $time
        ]);

    }
}
