<?php

namespace App\Enums;

enum UserPermission: string
{
    case VIEW_ANY_USER = 'view_users';
    case CREATE_USERS = 'create_users';
    case EDIT_USERS = 'edit_users';
    case LOCK_USERS = 'lock_users';
    case CREATE_CLIENT = 'create_client';
    case CREATE_VOLUNTEER = 'create_volunteer';
    case CREATE_STAFF = 'create_staff';
    case VIEW_ASSIGNED_VOLUNTEER_REQUESTS = 'view_assigned_volunteer_requests';
    case VIEW_ANY_VOLUNTEER_REQUESTS = 'view_any_volunteer_requests';
    case CREATE_VOLUNTEER_REQUESTS = 'create_volunteer_requests';
    case EDIT_VOLUNTEER_REQUESTS = 'edit_volunteer_requests';
    case VIEW_ASSIGNED_VOLUNTEER_ACTIVITIES = 'view_assigned_volunteer_activities';
    case VIEW_ANY_VOLUNTEER_ACTIVITIES = 'view_any_volunteer_activities';

    public function label(): string
    {
        return match ($this) {
            self::VIEW_ANY_USER => 'View Any Users',
            self::CREATE_USERS => 'Create Users',
            self::EDIT_USERS => 'Edit Users',
            self::LOCK_USERS => 'Lock Users',
            self::CREATE_CLIENT => 'Create Client',
            self::CREATE_VOLUNTEER => 'Create Volunteer',
            self::CREATE_STAFF => 'Create Staff',
            self::VIEW_ASSIGNED_VOLUNTEER_REQUESTS => 'View Assigned Volunteer Requests',
            self::VIEW_ANY_VOLUNTEER_REQUESTS => 'View Any Volunteer Requests',
            self::CREATE_VOLUNTEER_REQUESTS => 'Create Volunteer Requests',
            self::EDIT_VOLUNTEER_REQUESTS => 'Edit Volunteer Requests',
            self::VIEW_ASSIGNED_VOLUNTEER_ACTIVITIES => 'View Assigned Volunteer Activities',
            self::VIEW_ANY_VOLUNTEER_ACTIVITIES => 'View Any Volunteer Activities',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::VIEW_ANY_USER => 'View users in the system.',
            self::CREATE_USERS => 'Create new users.',
            self::EDIT_USERS => 'Edit existing users.',
            self::LOCK_USERS => 'Lock users from accessing the system.',
            self::CREATE_CLIENT => 'Create new clients.',
            self::CREATE_VOLUNTEER => 'Create new volunteers.',
            self::CREATE_STAFF => 'Create new staff.',
            self::VIEW_ASSIGNED_VOLUNTEER_REQUESTS => 'View assigned volunteer requests.',
            self::VIEW_ANY_VOLUNTEER_REQUESTS => 'View volunteer requests.',
            self::CREATE_VOLUNTEER_REQUESTS => 'Create new volunteer requests.',
            self::EDIT_VOLUNTEER_REQUESTS => 'Edit existing volunteer requests.',
            self::VIEW_ASSIGNED_VOLUNTEER_ACTIVITIES => 'View assigned volunteer activities.',
            self::VIEW_ANY_VOLUNTEER_ACTIVITIES => 'View volunteer activities.',
        };
    }
}
