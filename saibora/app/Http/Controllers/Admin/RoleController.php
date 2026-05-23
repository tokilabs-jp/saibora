<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __invoke()
    {
        $permissions = Permission::with('roles')->get();

        return view('admin.roles.index', compact('permissions'));
    }
}
