<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminController
{
    /**
     * Function for get all users
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'role' => 'nullable|string'
        ]);
        try {
            $users = User::when($request->get('type'), function ($query) use ($request) {
                return $query->where('role', $request->get('role'));
            })
                ->when($request->get('search'), function ($query) use ($request) {
                    return $query->where('name', 'like', '%' . $request->get('search') . '%')
                        ->orWhere('email', 'like', '%' . $request->get('search') . '%');
                })
                ->paginate(10);
            return view('Admin.Users.Userstable', ['data' => $users]);
        } catch (Exception $e) {
            Log::error("An error ocured", $e->getMessage());
        }
    }
}
