<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UserRole::cases() as $role) {
            Role::create([
                'name' => $role->value,
                'guard_name' => 'web',
            ]);
        }

        $system_admin = User::whereEmail('dev@tokilabs.jp')->firstOrFail();
        $system_admin->assignRole(Role::findByName(UserRole::SYSTEM_ADMIN->value));

        $staffs = User::where('email', 'like', 'dev+staff-%')->get();
        $staffs->each(fn ($staff) => $staff->assignRole(Role::findByName(UserRole::STAFF->value)));

        $clients = User::where('email', 'like', 'dev+client-%')->get();
        $clients->each(fn ($client) => $client->assignRole(Role::findByName(UserRole::CLIENT->value)));

        $volunteers = User::where('email', 'like', 'dev+volunteer-%')->get();
        $volunteers->each(fn ($volunteer) => $volunteer->assignRole(Role::findByName(UserRole::VOLUNTEER->value)));
    }
}
