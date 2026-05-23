<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user_attributes = [
            ['name' => 'Hirokazu Toki', 'email' => 'dev@tokilabs.jp'],
            ['name' => 'Staff A', 'email' => 'dev+staff-a@tokilabs.jp'],
            ['name' => 'Staff B', 'email' => 'dev+staff-b@tokilabs.jp'],
            ['name' => 'Staff C', 'email' => 'dev+staff-c@tokilabs.jp'],
            ['name' => 'Staff D', 'email' => 'dev+staff-d@tokilabs.jp'],
            ['name' => 'Staff E', 'email' => 'dev+staff-e@tokilabs.jp'],
            ['name' => 'Client A', 'email' => 'dev+client-a@tokilabs.jp'],
            ['name' => 'Client B', 'email' => 'dev+client-b@tokilabs.jp'],
            ['name' => 'Client C', 'email' => 'dev+client-c@tokilabs.jp'],
            ['name' => 'Client D', 'email' => 'dev+client-d@tokilabs.jp'],
            ['name' => 'Client E', 'email' => 'dev+client-e@tokilabs.jp'],
            ['name' => 'Volunteer 1', 'email' => 'dev+volunteer-1@tokilabs.jp'],
            ['name' => 'Volunteer 2', 'email' => 'dev+volunteer-2@tokilabs.jp'],
            ['name' => 'Volunteer 3', 'email' => 'dev+volunteer-3@tokilabs.jp'],
            ['name' => 'Volunteer 4', 'email' => 'dev+volunteer-4@tokilabs.jp'],
            ['name' => 'Volunteer 5', 'email' => 'dev+volunteer-5@tokilabs.jp'],
            ['name' => 'Volunteer 6', 'email' => 'dev+volunteer-6@tokilabs.jp'],
            ['name' => 'Volunteer 7', 'email' => 'dev+volunteer-7@tokilabs.jp'],
            ['name' => 'Volunteer 8', 'email' => 'dev+volunteer-8@tokilabs.jp'],
            ['name' => 'Volunteer 9', 'email' => 'dev+volunteer-9@tokilabs.jp'],
            ['name' => 'Volunteer 10', 'email' => 'dev+volunteer-10@tokilabs.jp'],
        ];

        foreach ($user_attributes as $attributes) {
            User::factory()->create($attributes);
        }
    }
}
