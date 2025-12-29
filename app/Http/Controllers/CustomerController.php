<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function editProfile(Request $request){
        $user = $request->user();
        $data = $request->validate([
            "name" => "required|string",
            "fullname" => "required|string",
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
        
        $user->update([
            'name' => $data['name'],
        ]);
        
        $user->customer->update([
            'Fullname' => $data['fullname'],
            'Notel' => $data['telephone'],
        ]);
        
        $user->customer->address->update([ 
            "address1" => $data["address1"],
            "address2" => $data["address2"],
            "address3" => $data["address3"],
            "postcode" => $data["postcode"],
            "city" => $data["city"],
            "state" => $data["state"],
            "country" => $data["country"],
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully'
        ], 200);
    }
}
