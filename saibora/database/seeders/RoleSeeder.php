<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
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

        $system_admin_role = Role::findByName(UserRole::SYSTEM_ADMIN->value);
        $system_admin_role->givePermissionTo(UserRole::SYSTEM_ADMIN->defaultPermissions());
        $system_admin = User::whereEmail('dev@tokilabs.jp')->firstOrFail();
        $system_admin->assignRole($system_admin_role);

        $staff_role = Role::findByName(UserRole::STAFF->value);
        $staff_role->givePermissionTo(UserRole::STAFF->defaultPermissions());
        $staffs = User::where('email', 'like', 'dev+staff-%')->get();
        $staffs->each(fn ($staff) => $staff->assignRole($staff_role));

        $client_role = Role::findByName(UserRole::CLIENT->value);
        $client_role->givePermissionTo(UserRole::CLIENT->defaultPermissions());
        $clients = User::where('email', 'like', 'dev+client-%')->get();
        $clients->each(fn ($client) => $client->assignRole($client_role));

        $volunteer_role = Role::findByName(UserRole::VOLUNTEER->value);
        $volunteer_role->givePermissionTo(UserRole::VOLUNTEER->defaultPermissions());
        $volunteers = User::where('email', 'like', 'dev+volunteer-%')->get();
        $volunteers->each(fn ($volunteer) => $volunteer->assignRole($volunteer_role));
    }
}
