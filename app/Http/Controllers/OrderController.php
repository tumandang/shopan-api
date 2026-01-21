<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function FetchOrder(){
        $ListOrder = Order::with('request')->get(); 

        return response()->json([
                'status' => true,
                'request' => $ListOrder
        ]);
    }

    public function viewInvoice(int $order_id){
        $order = Order::findOrFail($order_id);
        return view('pages.request.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $order_id){
        $order = Order::findOrFail($order_id);

        $data = ['order' => $order];
        $pdf = Pdf::loadView('pages.request.invoice.generate-receipt', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');
    }
}
