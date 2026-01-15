<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use App\Models\Request as RequestProduct;
class StripeWebhookController extends Controller
{
    public function handle(Request $request)
{
    $event = Webhook::constructEvent(
        $request->getContent(),
        $request->header('Stripe-Signature'),
        config('services.stripe.webhook')
    );

    if ($event->type === 'checkout.session.completed') {
        $session = $event->data->object;

        RequestProduct::where('id', $session->metadata->request_id)
            ->update(['status' => 'paid']);
    }

    return response()->json(['success' => true]);
}
}
