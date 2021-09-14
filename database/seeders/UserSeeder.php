<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name'=>'Carlos',
            'email'=>'ccruz107@hotmail.com',
            'password'=>'$2y$10$ToND4j1NNLdmib8uBQKfeeDojHT4nCO/cG/8j750jD5CjRK/O8/nu'
        ]);
    }
}
