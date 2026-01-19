<?php

namespace App\Http\Controllers;

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
                $request->getContent(), //
                $request->header('Stripe-Signature'),
                config('services.stripe.webhook')
            );
        } catch (\Exception $e) {
            Log::error('Stripe signature error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }
 
        // rekod setiap event yang receive
        Log::info('Stripe event received', [
            'type' => $event->type
        ]);

        if ($event->type === 'payment_intent.succeeded') {
            $intent = $event->data->object;

            //cari request masa buat payment
            if (!isset($intent->metadata->request_id)) {
                Log::warning('No request_id in metadata');
                return response()->json(['ok' => true]);
            }

            RequestProduct::where('id', $intent->metadata->request_id)
                ->update(['status' => 'paid']);

            Log::info('Request marked as paid', [
                'request_id' => $intent->metadata->request_id
            ]);
        }

        return response()->json(['ok' => true]);
    }
}
