<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt #{{ $order->id ?? 'N/A' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { 
            font-family: 'Outfit', sans-serif; 
        }
        .font-mono { 
            font-family: 'JetBrains Mono', monospace; 
        }

        .receipt-paper {
            background: linear-gradient(to bottom, #fafafa 0%, #ffffff 10%, #ffffff 90%, #f5f5f5 100%);
            box-shadow: 
                0 0 0 1px rgba(0,0,0,0.05), 
                0 2px 4px rgba(0,0,0,0.02), 
                0 8px 16px rgba(0,0,0,0.04), 
                0 16px 32px rgba(0,0,0,0.03);
        }
        
        .perforated-top {
            position: relative;
        }
        .perforated-top::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 0;
            right: 0;
            height: 8px;
            background-image: radial-gradient(circle at 5px 0px, transparent 4px, #fafafa 4px);
            background-size: 10px 8px;
            background-repeat: repeat-x;
        }
        
        .perforated-bottom {
            position: relative;
        }
        .perforated-bottom::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 8px;
            background-image: radial-gradient(circle at 5px 8px, transparent 4px, #f5f5f5 4px);
            background-size: 10px 8px;
            background-repeat: repeat-x;
        }
        
        .dotted-line { 
            border-top: 2px dashed #e0e0e0; 
        }
        
        @media print {
            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
            .no-print { 
                display: none !important; 
            }
            .receipt-paper { 
                box-shadow: none; 
            }
        }

        @keyframes fadeInUp { 
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            } 
            to { 
                opacity: 1; 
                transform: translateY(0); 
            } 
        }
        .animate-fade-in { 
            animation: fadeInUp 0.6s ease-out; 
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-gray-50 to-slate-100 min-h-screen flex items-center justify-center p-8">

    <div class="w-full max-w-md animate-fade-in">
        
        <div class="receipt-paper perforated-top perforated-bottom" style="margin-top: 12px; margin-bottom: 12px;">
            <div class="px-8 py-10">

               
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <img class="w-28 h-14" src="{{ asset('img/logoshoppyJapan.png') }}"/>
                    </div>
                    <p class="text-xs text-slate-500 uppercase tracking-widest font-medium">Payment Receipt</p>
                </div>

           
                <div class="text-center text-xs text-slate-600 space-y-0.5 mb-8 pb-6 border-b border-slate-200">
                    <p>12A & 14A, Jalan Pulai Mutiara 9/5, Taman Pulai Mutiara 2, 81100 ,</p>
                    <p>Johor Bahru,Johor, Malaysia</p>
                    <p class="pt-1">+6013-598-7486 • support@shopan.com</p>
                </div>

               
                <div class="space-y-2.5 text-sm mb-8">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Receipt No:</span>
                        <span class="font-mono font-semibold text-slate-900">#{{ str_pad($order->id ?? 0, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Date:</span>
                        <span class="font-mono text-slate-900">{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}</span>
                    </div>
                    @if(isset($order->user))
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 font-medium">Customer:</span>
                        <span class="text-slate-900">{{ $order->user->name }}</span>
                    </div>
                    @endif
                </div>

                <div class="dotted-line my-8"></div>

              
                @if(isset($order->request))
                    @php
                        $item = $order->request;
                        $itemTotal = $item->quantity * $item->product_price;
                        $service_fee = $item->service_fee;
                        $domestic_fee = $item->domestic_shipping;
                        $quoted_total = $item->quoted_total;
                    @endphp
                    <div class="mb-8">
                        <div class="mb-4">
                            <p class="font-semibold text-slate-900 text-base mb-1">{{ $item->product_name }}</p>
                            @if(isset($item->market_name))
                                <p class="text-xs text-slate-500">from {{ $item->market_name }}</p>
                            @endif
                        </div>
                        <div class="flex justify-between items-center text-sm bg-slate-50 rounded-lg px-4 py-3">
                            <span class="text-slate-600">{{ $item->quantity }} × ¥{{ number_format($item->product_price, 2) }}</span>
                            <span class="font-mono font-bold text-slate-900 text-base">¥{{ number_format($itemTotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm bg-slate-50 rounded-lg px-4 py-3">
                            <span class="text-slate-600">Service Fee</span>
                            <span class="font-mono font-bold text-slate-900 text-base">¥{{ number_format($service_fee, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm bg-slate-50 rounded-lg px-4 py-3">
                            <span class="text-slate-600">Domestic Shop</span>
                            <span class="font-mono font-bold text-slate-900 text-base">¥{{ number_format($domestic_fee, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm bg-slate-50 rounded-lg px-4 py-3">
                            <span class="text-slate-600">Quoted Total</span>
                            <span class="font-mono font-bold text-slate-900 text-base">¥{{ number_format($quoted_total, 2) }}</span>
                        </div>
                    </div>
                @endif

                <div class="dotted-line my-8">

                </div>

                
                <div class="mb-8">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-slate-700 font-semibold">Amount Paid</span>
                            <span class="font-mono font-bold text-slate-900 text-xl">RM {{ number_format($order->amount_myr, 2) }}</span>
                        </div>
                        <div class="pt-3 border-t border-blue-200">
                            <p class="text-xs text-slate-600 leading-relaxed">
                                This invoice acknowledges payment for the product, service fee, and domestic shipping. 
                                International shipping to Malaysia will be invoiced separately once calculated.
                            </p>
                        </div>
                    </div>
                </div>

           
                @if(isset($order->payment_method))
                <div class="bg-slate-50 rounded-xl px-5 py-4 mb-8 space-y-2">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-600 font-medium">Payment Method:</span>
                        <span class="font-semibold text-slate-900 capitalize">{{ $order->payment_method }}</span>
                    </div>
                    @if(isset($order->payment_date))
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-600 font-medium">Paid On:</span>
                        <span class="font-mono text-slate-900">{{ $order->payment_date->format('d/m/Y H:i') }}</span>
                    </div>
                    @endif
                    @if(isset($order->transaction_id))
                    <div class="pt-2 border-t border-slate-200">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Transaction ID:</span>
                            <span class="font-mono text-slate-700">{{ $order->transaction_id }}</span>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

         
                <div class="text-center mb-8">
                    <div class="inline-flex items-center gap-2.5 px-5 py-2.5 bg-green-50 text-green-700 border-2 border-green-200 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-bold uppercase tracking-wider">Payment Received</span>
                    </div>
                </div>

                <div class="dotted-line my-8"></div>

                <div class="text-center space-y-4">
                    <p class="text-sm text-slate-700 font-medium leading-relaxed">
                        Thank you for your payment! You will receive a separate invoice for international shipping once calculated.
                    </p>
                    <p class="text-xs text-slate-500 italic">
                        Returns accepted within 30 days with receipt
                    </p>
                </div>

      
                <div class="text-center mt-8 pt-6 border-t border-slate-200">
                    <div class="flex items-center justify-center gap-3 text-xs text-slate-500">
                        <span>@shopan</span>
                        <span>•</span>
                        <span>www.shopan.com</span>
                    </div>
                </div>

            </div>
        </div>


        <div class="flex gap-3 mt-6 no-print">
            <a href="{{ url()->previous() }}" class="flex-1 bg-white hover:bg-slate-50 text-slate-900 font-semibold px-6 py-3.5 rounded-xl shadow-lg border-2 border-slate-200 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Go Back</span>
                </div>
            </a>
            <button onclick="window.print()" class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    <span>Print Receipt</span>
                </div>
            </button>
        </div>
    </div>

</body>
</html>