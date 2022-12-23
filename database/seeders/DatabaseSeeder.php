<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        DB::table('users')->insert([
            
            'name' => 'Nian Gita',
            'phone'=> '089372748834',
            'email'=> 'nian@gmail.com',
            'password'=> Hash::make('niangita123'),
            'role_as'=> 1,

        ]);
        DB::table('users')->insert([
            
            'name' => 'Dimas',
            'phone'=> '089374658834',
            'email'=> 'dimas@gmail.com',
            'password'=> Hash::make('dimas123'),
            'role_as'=> 1,

        ]);

    }
}
