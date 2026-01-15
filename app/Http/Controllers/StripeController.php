<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Request as RequestProduct;

class StripeController extends Controller
{
    public function createCheckout(Request $request)
    {
      
        $request->validate([
            'request_id' => 'required|exists:requests,id',
        ]);

        $requestProduct = RequestProduct::findOrFail($request->request_id);

        if ($requestProduct->status !== 'pending_payment') {
            return response()->json([
                'message' => 'Payment not allowed for this request'
            ], 400);
        }
        $locale = $request->input('locale', 'en');

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card', 'fpx'],
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => $requestProduct->product_name,
                    ],
                    'unit_amount' => (int) round($requestProduct->total_myr * 100),
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'request_id' => $requestProduct->id,
                'user_id' => $requestProduct->user_id,
            ],
            'success_url' => "http://localhost:3000/{$locale}/payment/success?session_id={CHECKOUT_SESSION_ID}",
             'cancel_url'  => "http://localhost:3000/{$locale}/payment/cancel",
        ]);

        return response()->json([
            'checkout_url' => $session->url
        ]);
    }

}
