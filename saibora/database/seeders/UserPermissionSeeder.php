<?php

namespace Database\Seeders;

use App\Enums\UserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UserPermission::cases() as $permission) {
            Permission::create(['name' => $permission->value]);
        }
    }
}
