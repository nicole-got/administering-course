<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>  "nicole",
            'email'     =>  "nicole3@nicole.com",
            'password'  =>  env('PASSWORD_HASH') ? bcrypt("123456") : "123456",
            'phone'     =>  "31997744787",
            'genero'    =>  "feminino"
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
