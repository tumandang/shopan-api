<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function FetchOrder(){
        $ListOrder = Order::with('request')->get(); 

        return response()->json([
                'status' => true,
                'request' => $ListOrder
        ]);
    }
}
