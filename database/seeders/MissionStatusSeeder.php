<?php

namespace Database\Seeders;

use App\Models\MissionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MissionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MissionStatus::upsert([
            ['id' => Str::uuid(), 'name' => 'Upcoming', 'code' => 'upcoming'],
            ['id' => Str::uuid(), 'name' => 'In Progress', 'code' => 'in_progress'],
            ['id' => Str::uuid(), 'name' => 'Completed', 'code' => 'completed'],
            ['id' => Str::uuid(), 'name' => 'Cancelled', 'code' => 'cancelled'],
        ], ['code']);
    }
}
