<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requestproducts = ModelsRequest::with('user')->get();
        return view('pages.request.requesttable',compact('requestproducts'));
    }

    // Request API
    public function RequestAPI(Request $request)
    {
        $data = $request->validate([
            'product_url'       => 'required|url|max:1000',
            'product_name'      => 'required|string|max:255',
            'market_name'       => 'required|string|max:100',
            'quantity'          => 'required|integer|min:1',
            'product_price'     => 'required|numeric|min:0',
            'size'              => 'nullable|string|max:50',
            'color'             => 'nullable|string|max:50',
            'model'             => 'nullable|string|max:100',
            'product_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'customer_notes'    => 'nullable|string|max:2000',
        ]);
        $data['user_id'] = auth()->id();
        $requestProduct = ModelsRequest::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Request submitted successfully',
            'data'    => $requestProduct
        ]);
    }

    public function updateRequest(Request $request){
      

    }
}
