<?php

namespace Database\Seeders;

use App\Models\MissionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MissionCategory::upsert([
            [ 'id' => Str::uuid(), 'name' => 'Volunteering', 'code' => 'volunteer'],
            [ 'id' => Str::uuid(), 'name' => 'Events', 'code' => 'events'],
            [ 'id' => Str::uuid(), 'name' => 'Challenges', 'code' => 'challenges'],
            [ 'id' => Str::uuid(), 'name' => 'Community Service', 'code' => 'community'],
            [ 'id' => Str::uuid(), 'name' => 'Education', 'code' => 'education'],
            [ 'id' => Str::uuid(), 'name' => 'Health and Wellness', 'code' => 'wellness'],
            [ 'id' => Str::uuid(), 'name' => 'Environment', 'code' => 'environment'],
            [ 'id' => Str::uuid(), 'name' => 'Arts and Culture', 'code' => 'culture'],
            [ 'id' => Str::uuid(), 'name' => 'Sports and Recreation', 'code' => 'sports'],
            [ 'id' => Str::uuid(), 'name' => 'Fundraising', 'code' => 'fundraising'],
        ], ['code']);
    }
}
