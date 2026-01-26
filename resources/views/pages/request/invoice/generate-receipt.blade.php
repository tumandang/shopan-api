<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Receipt #{{ $order->id ?? 'N/A' }}</title>
<style>
    /* Reset */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; font-size: 12pt; color: #333; background: #fff; }
    a { text-decoration: none; color: inherit; }

    /* Page wrapper */
    .page {
        width: 794px;  /* A4 width px */
        min-height: 1123px; /* A4 height px */
        padding: 40px;
        margin: 0 auto;
        background: #fff;
    }

    .receipt-container {
        max-width: 640px;
        margin: 0 auto;
        background: #fafafa;
        border: 1px solid #e0e0e0;
        padding: 30px;
    }

    /* Header */
    .header { text-align: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e0e0e0; }
    .logo { width: 120px; height: auto; margin-bottom: 10px; }
    .receipt-title { font-size: 10pt; color: #666; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; }

    /* Company Info */
    .company-info { text-align: center; font-size: 9pt; color: #555; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ddd; line-height: 1.5; }

    /* Receipt Details (Table layout for PDF) */
    .receipt-details { margin-bottom: 20px; }
    .detail-table { width: 100%; border-collapse: collapse; }
    .detail-table td { padding: 6px 0; }
    .detail-label { width: 40%; color: #666; font-weight: 500; }
    .detail-value { width: 60%; color: #000; font-weight: 600; font-family: monospace; }

    /* Divider */
    .divider { border-top: 1px solid #ccc; margin: 20px 0; }

    /* Items Section */
    .items-section { margin-bottom: 20px; }
    .item-header { margin-bottom: 10px; }
    .item-name { font-size: 11pt; font-weight: 700; color: #000; }
    .item-market { font-size: 9pt; color: #777; }
    .item-table { width: 100%; border-collapse: collapse; margin-top: 5px; }
    .item-table td { padding: 8px 6px; }
    .item-description { color: #555; font-size: 10pt; }
    .item-amount { font-family: monospace; font-weight: 700; font-size: 11pt; color: #000; text-align: right; }

    /* Total Section */
    .total-section { background: #e8f4f8; border: 2px solid #4a90e2; border-radius: 6px; padding: 15px; margin-bottom: 20px; }
    .total-table { width: 100%; border-collapse: collapse; }
    .total-label { font-size: 11pt; font-weight: 700; color: #333; }
    .total-amount { font-family: monospace; font-size: 16pt; font-weight: 700; color: #000; text-align: right; }
    .total-note { font-size: 8pt; color: #555; line-height: 1.4; margin-top: 10px; padding-top: 10px; border-top: 1px solid #b3d9f2; }

    /* Payment Info */
    .payment-info { background: #f5f5f5; border-radius: 6px; padding: 10px; margin-bottom: 20px; }
    .payment-table { width: 100%; border-collapse: collapse; }
    .payment-label { width: 40%; color: #666; font-weight: 500; padding: 4px 0; }
    .payment-value { width: 60%; color: #000; font-weight: 600; padding: 4px 0; }

    .transaction-id { font-size: 8pt; margin-top: 5px; border-top: 1px solid #ddd; padding-top: 4px; font-family: monospace; }

    /* Status Badge */
    .status-badge { text-align: center; margin-bottom: 20px; }
    .badge { display: inline-block; background: #d4edda; color: #155724; border: 2px solid #28a745; border-radius: 20px; padding: 8px 20px; font-weight: 700; font-size: 10pt; text-transform: uppercase; }
    .checkmark { display: inline-block; width: 16px; height: 16px; border-radius: 50%; background: #28a745; color: white; font-weight: bold; text-align: center; line-height: 16px; margin-right: 6px; }

    /* Footer */
    .footer-message { text-align: center; margin-bottom: 15px; }
    .thank-you { font-size: 10pt; color: #333; font-weight: 500; margin-bottom: 5px; line-height: 1.5; }
    .return-policy { font-size: 8pt; color: #777; font-style: italic; }
    .footer-info { text-align: center; padding-top: 10px; border-top: 1px solid #ddd; font-size: 8pt; color: #999; }

    /* Print/Page */
    @media print {
        body { margin: 0; padding: 0; }
        .page { margin: 0; padding: 20px; }
        .receipt-container { border: none; box-shadow: none; }
    }
</style>
</head>
<body>
<div class="page">
    <div class="receipt-container">
        <!-- Header -->
        <div class="header">
            <img class="logo" src="{{ public_path('img/logoshoppyJapan.png') }}" alt="Shoppy Japan Logo"/>
            <div class="receipt-title">Payment Receipt</div>
        </div>

        <!-- Company Info -->
        <div class="company-info">
            <div>12A & 14A, Jalan Pulai Mutiara 9/5, Taman Pulai Mutiara 2, 81100</div>
            <div>Johor Bahru, Johor, Malaysia</div>
            <div style="margin-top: 5px;">+6013-598-7486 • support@shopan.com</div>
        </div>

        <!-- Receipt Details -->
        <div class="receipt-details">
            <table class="detail-table">
                <tr>
                    <td class="detail-label">Receipt No:</td>
                    <td class="detail-value">#{{ str_pad($order->id ?? 0, 6, '0', STR_PAD_LEFT) }}</td>
                </tr>
                <tr>
                    <td class="detail-label">Date:</td>
                    <td class="detail-value">{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}</td>
                </tr>
                @if(isset($order->user))
                <tr>
                    <td class="detail-label">Customer:</td>
                    <td class="detail-value">{{ $order->user->name }}</td>
                </tr>
                @endif
            </table>
        </div>

        <div class="divider"></div>

        <!-- Items Section -->
        @if(isset($order->request))
            @php
                $item = $order->request;
                $itemTotal = $item->quantity * $item->product_price;
                $service_fee = $item->service_fee;
                $domestic_fee = $item->domestic_shipping;
                $quoted_total = $item->quoted_total;
            @endphp
            <div class="items-section">
                <div class="item-header">
                    <div class="item-name">{{ $item->product_name }}</div>
                    @if(isset($item->market_name))
                        <div class="item-market">from {{ $item->market_name }}</div>
                    @endif
                </div>
                <table class="item-table">
                    <tr>
                        <td class="item-description">{{ $item->quantity }} × ¥{{ number_format($item->product_price, 2) }}</td>
                        <td class="item-amount">¥{{ number_format($itemTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="item-description">Service Fee</td>
                        <td class="item-amount">¥{{ number_format($service_fee, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="item-description">Domestic Shipping</td>
                        <td class="item-amount">¥{{ number_format($domestic_fee, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="item-description">Quoted Total</td>
                        <td class="item-amount">¥{{ number_format($quoted_total, 2) }}</td>
                    </tr>
                </table>
            </div>
        @endif

        <div class="divider"></div>


        <div class="total-section">
            <table class="total-table">
                <tr>
                    <td class="total-label">Amount Paid</td>
                    <td class="total-amount">RM {{ number_format($order->amount_myr, 2) }}</td>
                </tr>
            </table>
            <div class="total-note">
                This invoice acknowledges payment for the product, service fee, and domestic shipping. 
                International shipping to Malaysia will be invoiced separately once calculated.
            </div>
        </div>

        @if(isset($order->payment_method))
        <div class="payment-info">
            <table class="payment-table">
                <tr>
                    <td class="payment-label">Payment Method:</td>
                    <td class="payment-value" style="text-transform: capitalize;">{{ $order->payment_method }}</td>
                </tr>
                @if(isset($order->payment_date))
                <tr>
                    <td class="payment-label">Paid On:</td>
                    <td class="payment-value">{{ $order->payment_date->format('d/m/Y H:i') }}</td>
                </tr>
                @endif
            </table>
            @if(isset($order->transaction_id))
            <div class="transaction-id">
                Transaction ID: {{ $order->transaction_id }}
            </div>
            @endif
        </div>
        @endif

        
        <div class="status-badge">
            <div class="badge">
                <span class="checkmark">✓</span>
                <span>Payment Received</span>
            </div>
        </div>

        <div class="divider"></div>

    
        <div class="footer-message">
            <div class="thank-you">
                Thank you for your payment! You will receive a separate invoice for international shipping once calculated.
            </div>
            <div class="return-policy">
                Returns accepted within 30 days with receipt
            </div>
        </div>

    
        <div class="footer-info">
            <div>@shopan • www.shopan.com</div>
        </div>

    </div>
</div>
</body>
</html>
