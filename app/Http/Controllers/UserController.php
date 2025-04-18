<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController
{
    /**
     * Function for register user
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        try {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ]);
            return response()->json([
                'message' => 'Registration successful',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Registration failed',
            ], 500);
        }
    }

    /**
     * Function for login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $user = User::where('email', $request->get('email'))->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            $checked = Hash::check($request->get('password'), $user->password);
            if (!$checked) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], 400);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'User login successful',
                'token' => $token,
                'data' => [
                    'name' => $user->name,
                    'avatar' => $user->avatar
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Something went wrong'
            ], 400);
        }
    }

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
            return response()->json([
                'success' => true,
                'message' => 'Data retrived successfully',
                'data' => $users,

            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Something went wrong'
            ], 400);
        }
    }

    /**
     * Function for edit user
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'role' => 'nullable|in:user,admin,partner',
        ]);

        try {

            $user = User::findOrFail($request->get('id'));
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ]);
            return response()->json([
                'success' => true,
                'message' => "User updated successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Something went wrong'
            ], 400);
        }
    }

    /**
     * Function for delete user
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        try {
            User::findOrFail($request->get('id'))->delete();
            return response()->json([
                'success' => true,
                'message' => 'User delete successfull'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Something went wrong'
            ], 400);
        }
    }

    /**
     * Function for logout user
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Something went wrong'
            ], 400);
        }
    }
}
