<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\KelurahanSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123123123')
        // ]);
        
        $this->call(KelurahanSeeder::class);
    }
}
