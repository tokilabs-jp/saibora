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
}
