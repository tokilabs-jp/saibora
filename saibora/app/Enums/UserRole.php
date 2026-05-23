<?php

namespace App\Enums;

enum UserRole: string
{
    case CLIENT = 'client';
    case VOLUNTEER = 'volunteer';
    case STAFF = 'staff';
    case SYSTEM_ADMIN = 'system_admin';

    public function label(): string
    {
        return match ($this) {
            self::CLIENT => 'Client',
            self::VOLUNTEER => 'Volunteer',
            self::STAFF => 'Staff',
            self::SYSTEM_ADMIN => 'System Admin',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::CLIENT => 'green',
            self::VOLUNTEER => 'blue',
            self::STAFF => 'yellow',
            self::SYSTEM_ADMIN => 'red',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::CLIENT => 'A client user.',
            self::VOLUNTEER => 'A volunteer user.',
            self::STAFF => 'A staff user.',
            self::SYSTEM_ADMIN => 'Administrator users can perform any action.',
        };
    }

    public static function selectableRoles(): array
    {
        return [
            self::CLIENT,
            self::VOLUNTEER,
            self::STAFF,
        ];
    }

    public function guardName(): string
    {
        return match ($this) {
            self::CLIENT,
            self::STAFF,
            self::VOLUNTEER,
            self::SYSTEM_ADMIN => 'web',
        };
    }

    public function defaultPermissions(): array
    {
        return match ($this) {
            self::CLIENT => [
                UserPermission::CREATE_VOLUNTEER_REQUESTS->value,
                UserPermission::EDIT_VOLUNTEER_REQUESTS->value,
            ],
            self::VOLUNTEER => [
                UserPermission::VIEW_ASSIGNED_VOLUNTEER_REQUESTS->value,
                UserPermission::VIEW_ASSIGNED_VOLUNTEER_ACTIVITIES->value,
            ],
            self::STAFF => [
                UserPermission::CREATE_CLIENT->value,
                UserPermission::CREATE_VOLUNTEER->value,
                UserPermission::CREATE_STAFF->value,
                UserPermission::VIEW_ANY_VOLUNTEER_REQUESTS->value,
                UserPermission::CREATE_VOLUNTEER_REQUESTS->value,
                UserPermission::EDIT_VOLUNTEER_REQUESTS->value,
                UserPermission::VIEW_ANY_VOLUNTEER_ACTIVITIES->value,
            ],
            self::SYSTEM_ADMIN => [
                UserPermission::VIEW_ANY_USER->value,
                UserPermission::CREATE_USERS->value,
                UserPermission::EDIT_USERS->value,
                UserPermission::LOCK_USERS->value,
            ],
        };
    }
}
