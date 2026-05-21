<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(
                // Global search across id and email
                AllowedFilter::callback('search', function ($query, $value) {
                    if (is_numeric($value)) {
                        $query->where('id', $value);
                    } else {
                        $query->where('email', 'like', "%{$value}%");
                    }
                })
            )
            ->orderByDesc('id')
            ->paginate();

        return view('admin.users.index', compact('users'));
    }
}
