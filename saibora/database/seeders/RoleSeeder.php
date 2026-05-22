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

        $user = User::whereEmail('dev@tokilabs.jp')->firstOrFail();

        $all_roles = Role::all();

        $user->assignRole($all_roles);
    }
}
