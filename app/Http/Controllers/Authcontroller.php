<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    // Register API
    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "fullname" => "required|string",
            "email" => "required|email|unique:users,email",
            'password' => 'required|min:7|confirmed',
            'telephone' => [
                'required',
                'regex:/^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/'
            ],
            "address1" => "required",
            "address2" => "nullable",
            "address3" => "nullable",
            "postcode" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
        ]);

        $users = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
            'is_customers' => true,
        ]);

        $customers = customers::create([
            "user_id" => $users->id,
            "Fullname" => $data["fullname"],
            "Notel" => $data["telephone"],
        ]);

        $address = Address::create([
            "customer_id" => $customers->id,
            "address1" => $data["address1"],
            "address2" => $data["address2"],
            "address3" => $data["address3"],
            "postcode" => $data["postcode"],
            "city" => $data["city"],
            "state" => $data["state"],
            "country" => $data["country"],
        ]);

        return response()->json([
            "status" => true,
            "message" => "User Successfully Registered"
        ], 201);
    }

    // Login Api
 public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Create token
        $token = $user->createToken('customerToken')->plainTextToken;

        // Load relationships
        $user->load('customer.address');

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,  // Return token in response
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'customer' => $user->customer
            ]
        ], 200);
    }


    // Profile API 
    public function profile(Request $request)
    {
        $user = $request->user();
        $user->load('customer.address');

        return response()->json([
            "status" => true,
            "message" => "User Profile Data",
            "user" => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'customer' => $user->customer
            ]
        ], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ], 200)->cookie(
            'token',
            '',
            -1,  
            '/',
            null,
            true,
            true,
            false,
            'strict'
        );
    }
}
