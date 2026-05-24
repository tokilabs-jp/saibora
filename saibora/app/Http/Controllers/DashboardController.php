<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        // FIXME: add later (current_roles)
        $role = $user->roles->first();
        return to_route("{$role->name}.dashboard");
    }
}
