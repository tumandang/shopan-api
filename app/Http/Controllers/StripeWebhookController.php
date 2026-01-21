<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Webhook;
use App\Models\Request as RequestProduct;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        try {
            $event = Webhook::constructEvent(
                $request->getContent(), 
                $request->header('Stripe-Signature'),
                config('services.stripe.webhook')
            );
        } catch (\Exception $e) {
            Log::error('Stripe signature error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        Log::info('Stripe event received', ['type' => $event->type]);

        if ($event->type === 'payment_intent.succeeded') {
            $intent = $event->data->object;

            
            if (!isset($intent->metadata->request_id)) {
                Log::warning('No request_id in metadata');
                return response()->json(['ok' => true]);
            }

           
            $requestProduct = RequestProduct::find($intent->metadata->request_id);
            if (!$requestProduct) {
                Log::warning('Request not found', ['request_id' => $intent->metadata->request_id]);
                return response()->json(['ok' => true]);
            }
            $requestProduct->update(['status' => 'paid']);

       
            Order::create([
                'request_id' => $requestProduct->id,
                'user_id' => $requestProduct->user_id,
                'payment_provider' => 'stripe',
                'payment_intent_id' => $intent->id,
                'checkout_session_id' => $intent->latest_charge ?? null,
                'amount_myr' => $requestProduct->total_myr,
                'status' => 'processing'
            ]);

            Log::info('Request marked as paid and order created', [
                'request_id' => $requestProduct->id,
                'payment_intent_id' => $intent->id
            ]);
        }

        return response()->json(['ok' => true]);
    }
}
