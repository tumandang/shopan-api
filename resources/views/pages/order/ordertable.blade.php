@extends('layout.adminlayout')

@section('title', 'Order Management')

@section('content')

    <div class="bg-white px-6 py-4 flex items-center justify-between border-b border-gray-200 shadow-sm">
        <h1 class="text-lg font-semibold text-gray-900">Shopan Order Management</h1>

        <div class="flex items-center gap-4">
            <button class="text-gray-600 hover:text-gray-900 transition-colors" aria-label="Change language">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
            </button>

            <button class="text-gray-600 hover:text-gray-900 transition-colors relative" aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
            </button>

            <button class="text-gray-600 hover:text-gray-900 transition-colors" aria-label="User profile">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
        </div>
    </div>


    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Order Management</h2>
                <p class="mt-1 text-sm text-gray-600">Manage and organize customer requests</p>
            </div>


            <div class="bg-white rounded-lg shadow overflow-hidden">

                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-base font-semibold text-gray-900">
                        Orders
                        <span class="ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-500">
                            {{ count($orderproducts) }} Requests
                        </span>
                    </h3>
                </div>


                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Transaction ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orderproducts as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $order->payment_intent_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="h-10 w-10 rounded-full bg-gradient-to-r from-orange-500 to-red-600 flex items-center justify-center text-white text-sm font-semibold">
                                                {{ strtoupper(substr($order->request->user->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ $order->request->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        @if ($order->request?->user?->customer?->address)
                                            @php
                                                $address = $order->request->user->customer->address;
                                                $parts = array_filter([
                                                    $address->address1,
                                                    $address->address2,
                                                    $address->address3,
                                                    $address->postcode . ' ' . $address->city,
                                                    $address->state,
                                                    $address->country,
                                                ]);
                                                $fullAddress = implode(', ', $parts);
                                            @endphp
                                            <div class="max-w-xs">
                                                <p class="text-sm text-gray-900">{{ $fullAddress }}</p>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-sm">No address</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap capitalize">
                                        {{ $order->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        RM {{ $order->amount_myr }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick=""
                                            class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                            title="View">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        @if ($order->status == 'processing')
                                            <button onclick="" 
                                                class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                                title="Measure Product">
                                                <svg class="w-4 h-4"  viewBox="0 0 24 24"  fill="none" xmlns="http://www.w3.org/2000/svg" >
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6C1.34315 6 0 7.34315 0 9V16C0 17.6569 1.34315 19 3 19H21C22.6569 19 24 17.6569 24 16V9C24 7.34315 22.6569 6 21 6H3ZM9 8H7V13C7 13.5523 6.55228 14 6 14C5.44772 14 5 13.5523 5 13V8H3C2.44772 8 2 8.44772 2 9V16C2 16.5523 2.44772 17 3 17H21C21.5523 17 22 16.5523 22 16V9C22 8.44772 21.5523 8 21 8H19V11C19 11.5523 18.5523 12 18 12C17.4477 12 17 11.5523 17 11V8H15V13C15 13.5523 14.5523 14 14 14C13.4477 14 13 13.5523 13 13V8H11V11C11 11.5523 10.5523 12 10 12C9.44771 12 9 11.5523 9 11V8Z"
                                                    fill="currentColor"
                                                />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @if (count($orderproducts) == 0)
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-slate-900">No Orders</h3>
                                    <p class="mt-1 text-sm text-slate-500">Wait the customer make a payment for their
                                        request.</p>
                                </div>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
