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
        $data = $request->validate([
            'service_fee' => 'required|numeric|min:0' ,
            'domestic_shipping' => 'required|numeric|min:0',
            'admin_notes' => 'nullable|string|max:1000'
        ]);
        $requestProduct = ModelsRequest::findOrFail($request->request_id);
        $quotedTotal = ($requestProduct->product_price * $requestProduct->quantity) + $data['service_fee'] + $data['domestic_shipping'];
        $totalMyr = 0.02545 * $quotedTotal;
        $requestProduct->update([
            'status' => 'quoted',
            'service_fee' => $request->service_fee,
            'domestic_shipping' => $request->domestic_shipping,
            'quoted_total' => $quotedTotal,
            'total_myr' => $totalMyr,
            'admin_notes' => $request->admin_notes,
        ]);
        return back()->with('success', 'Price quoted successfully');
    }
    public function rejectRequest(Request $request){

        $request->validate(
            ['admin_notes' => 'nullable|string|max:1000']
        );
        $requestProduct = ModelsRequest::findOrFail($request->request_id);
        $requestProduct->update([
            'status' => 'reject',
            'admin_notes' => $request->admin_notes,
        ]);
        return back()->with('success', 'Request reject successfully');
    }
    public function cancelRequest(Request $request) {
        $id = $request->input('request_id');
        $requestProduct = ModelsRequest::findOrFail($id);
        $requestProduct->update(['status' => 'cancelled']);
        return response()->json(['status' => true, 'message' => 'Cancelled']);
    }
    public function acceptRequest(Request $request) {
        $id = $request->input('request_id');
        $requestProduct = ModelsRequest::findOrFail($id);
        $requestProduct->update(['status' => 'pending_payment']);
        return response()->json(['status' => true, 'message' => 'Accepted']);
    }
    public function deleteRequest($request_id){
        ModelsRequest::findOrFail($request_id)->delete();
        
        return redirect()->route('request.index')
            ->with('success', 'Request deleted successfully');
    }
    public function deleteRequestAPI(Request $request){

        $id = $request->input('request_id');
        ModelsRequest::findOrFail($id)->delete();
        return response()->json(['status' => true, 'message' => 'Deleted']);
    }

  public function FetchRequest(Request $request)
    {
            $ListRequest = ModelsRequest::all();
            
            return response()->json([
                'status' => true,
                'request' => $ListRequest
            ]);
            
    }
}
