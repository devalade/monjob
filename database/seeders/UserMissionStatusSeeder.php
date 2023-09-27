<?php

namespace Database\Seeders;

use App\Models\UserMissionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMissionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserMissionStatus::upsert([
            ['code' => 'registered', 'name' => 'Registered'],
            ['code' => 'active', 'name' => 'Active'],
            ['code' => 'completed', 'name' => 'Completed'],
            ['code' => 'cancelled', 'name' => 'Cancelled'],
            ['code' => 'no_show', 'name' => 'No-Show'],
            ['code' => 'pending_approval', 'name' => 'Pending Approval'],
            ['code' => 'invited', 'name' => 'Invited'],
            ['code' => 'waitlisted', 'name' => 'Waitlisted'],
            ['code' => 'notified', 'name' => 'Notified'],
            ['code' => 'suspended', 'name' => 'Suspended'],
            ['code' => 'banned', 'name' => 'Banned'],
        ], ['code']);
    }
}
