<?php

namespace App\Http\Controllers\Development;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LocalLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $role = $request->string('role')->toString();
        $user = User::query()->role($role)->orderBy('id', 'asc')->firstOrFail();

        \Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
