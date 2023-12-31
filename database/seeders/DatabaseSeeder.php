<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(MissionCategorySeeder::class);
        $this->call(MissionStatusSeeder::class);
        $this->call(UserMissionStatusSeeder::class);

         \App\Models\User::factory()->create([
             'name' => 'Alade Yessoufou',
             'email' => 'aladecharaf23@gmail.com',
             'password'=> Hash::make('Pa$$w0rd!')
         ]);
    }
}
