@extends('layout.adminlayout')

@section('title', 'Requests')

@section('content')

    <div class="mb-6 rounded-2xl bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-bold text-slate-800">Shopan Banner Management</h3>
        <p class="mt-1 text-sm text-slate-500">Manage and organize your banner slides</p>
    </div>


    <div class="w-full mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border border-slate-200 shadow-lg rounded-2xl">
                    <div class="p-6 pb-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white rounded-t-2xl">
                        <div class="flex items-center justify-between">
                            <h5 class="text-xl font-semibold text-slate-800">Request Table</h5>
                            <span class="px-3 py-1 text-sm font-medium text-orange-700 bg-orange-100 rounded-full">
                                {{ count($requestproducts) }} Requests
                            </span>
                        </div>
                    </div>


                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                                <thead class="align-bottom bg-slate-50">
                                    <tr>
                                        <th
                                            class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Request ID
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Customer
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Product
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Market
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Quantity
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Price
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Status
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Date
                                        </th>
                                        <th
                                            class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ($requestproducts as $requestproduct)
                                        <tr class="hover:bg-slate-50 transition-colors duration-150">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="text-sm font-medium text-slate-900">#RQ{{ $requestproduct->id }}</span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex-shrink-0 h-8 w-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                                        <span
                                                            class="text-white text-xs font-semibold">{{ strtoupper(substr($requestproduct->user->name, 0, 1)) }}</span>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-slate-900">
                                                            {{ $requestproduct->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>


                                            <td class="px-6 py-4">
                                                <p class="text-sm text-slate-900 font-medium">
                                                    {{ Str::limit($requestproduct->product_name, 15, '...') }}</p>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="text-sm text-slate-700">{{ $requestproduct->market_name }}</span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-800">
                                                    {{ $requestproduct->quantity }}
                                                </span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="text-sm font-semibold text-slate-900">¥{{ number_format($requestproduct->product_price, 2) }}</span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @php
                                                    $status = $requestproduct->status ?? 'New';
                                                    $statusClasses = match (strtolower($status)) {
                                                        'new' => 'bg-blue-100 text-blue-800',
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'processing' => 'bg-purple-100 text-purple-800',
                                                        'completed' => 'bg-green-100 text-green-800',
                                                        'cancelled' => 'bg-red-100 text-red-800',
                                                        default => 'bg-gray-100 text-gray-800',
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $statusClasses }} capitalize">
                                                    {{ $requestproduct->status }}
                                                </span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span
                                                    class="text-sm text-slate-600">{{ $requestproduct->created_at->format('d/m/Y') }}</span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center justify-center space-x-2">
                                                    @if ($requestproduct->status === 'new')
                                                        <button onclick="openViewModal({{ json_encode($requestproduct) }})"
                                                            class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                                            title="View">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </button>

                                                        <button  onclick="openQouteModal({{ json_encode($requestproduct) }})" class="p-2 bg-green-100 hover:bg-green-200 text-green-600 rounded-lg transition-colors"
                                                            title="Quote Price">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m1.5 9 2.25 3m0 0 2.25-3m-2.25 3v4.5M9.75 15h4.5m-4.5 2.25h4.5m-3.75-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                            </svg>
                                                        </button>

                                                        <a href="/"
                                                            class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors"
                                                            title="Reject">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </a>
                                                    @endif

                                                    @if ($requestproduct->status === 'qouted')
                                                        <button onclick="openViewModal({{ json_encode($requestproduct) }})"
                                                            class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                                            title="View">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </button>

                                                        <a href="/"
                                                            class="p-2 bg-amber-100 hover:bg-amber-200 text-amber-600 rounded-lg transition-colors"
                                                            title="Edit Quote">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            @if (count($requestproducts) == 0)
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-slate-900">No requests</h3>
                                    <p class="mt-1 text-sm text-slate-500">Wait the customer make a request.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="qoute-modal" class=" hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
        <div class=" bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto">

            <div class="bg-green-500 p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div class="">
                        <h2 class="text-2xl font-bold text-white">Qoute Price Form</h2>
                        <p class="text-blue-100 text-sm mt-1">Fill the qoute price form to inform the customer</p>
                    </div>
                    <button onclick="closeViewModal()"
                    class="text-white hover:bg-white/20 rounded-lg p-2 transition-colors">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-6 space-y-6">
                <div class="border border-slate-200 rounded-lg p-4 ">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m1.5 9 2.25 3m0 0 2.25-3m-2.25 3v4.5M9.75 15h4.5m-4.5 2.25h4.5m-3.75-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>

                        Request Details
                    </h3>
                    <div class=" grid grid-flow-col grid-cols-2 gap-4">
                        <div class="row-span-3 border-2 border-dashed border-slate-300 bg-slate-100 p-4 rounded-lg flex justify-center items-center gap-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <p>No Image</p>
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg ">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Request Name</p>
                            <p class="text-xs font-medium text-slate-900" id="modal-request-name">-</p>
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg ">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Market</p>
                            <p class="text-xs font-medium text-slate-900" id="modal-request-market">-</p>
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg col-span-3">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Customer Notes</p>
                            <p class="text-xs font-medium text-slate-900" id="modal-request-notes-c">-</p>
                            
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg col-span-2 ">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Product Url</p>
                            <a href="" target="_blank" class="text-xs font-medium text-slate-900 italic underline" id="modal-request-url">Click This Link</a>
                            
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg col-span-2 ">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Quantity</p>
                            <span id="modal-request-quantity"
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">New</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="view-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto">

            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Request Details</h2>
                        <p class="text-blue-100 text-sm mt-1">View complete request information</p>
                    </div>
                    <button onclick="closeViewModal()"
                        class="text-white hover:bg-white/20 rounded-lg p-2 transition-colors">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>


            <div class="p-6 space-y-6">

                <div class="grid grid-flow-col grid-cols-3 gap-4 ">
                    <div
                        class="row-span-3 border-2 border-dashed border-slate-300 bg-slate-100 p-4 rounded-lg flex justify-center items-center gap-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <p>No Image</p>
                    </div>
                    <div class="bg-slate-100 p-4 rounded-lg col-span-2">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Request ID</p>
                        <p class="text-lg font-bold text-slate-900" id="modal-request-id">#RQ001</p>
                    </div>
                    <div class="bg-slate-100 p-4 rounded-lg col-span-2">
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Status</p>
                        <span id="modal-status-badge"
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">New</span>
                    </div>
                </div>

                <div class="border border-slate-200 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Customer Information
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-slate-500 mb-1">Username</p>
                            <p class="text-sm font-medium text-slate-900" id="modal-customer-name">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-1">Email</p>
                            <p class="text-sm font-medium text-slate-900" id="modal-customer-email">-</p>
                        </div>
                    </div>
                </div>


                <div class="border border-slate-200 rounded-lg p-4">
                    <div class="flex justify-between">
                        <div>
                            <h3
                                class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-[#FF9A56]" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                Product Details
                            </h3>
                        </div>
                        <div>
                            <a href='-' target="_blank" id="modal-produt-url"
                                class=" px-4 py-2 bg-[#FF8133] bg-opacity-10 rounded-full mb-4 flex flex-row items-center justify-center gap-x-2">

                                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#FF9A56] w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>
                                <span class="text-[#FF9A56] font-semibold text-sm tracking-wide">Product URL</span>
                            </a>

                        </div>

                    </div>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-slate-500 mb-1">Product Name</p>
                            <p class="text-sm font-medium text-slate-900" id="modal-product-name">-</p>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <p class="text-xs text-slate-500 mb-1">Market</p>
                                <p class="text-sm font-medium text-slate-900" id="modal-market-name">-</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 mb-1">Quantity</p>
                                <p class="text-sm font-medium text-slate-900" id="modal-quantity">-</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 mb-1">Price</p>
                                <p class="text-sm font-semibold text-orange-600" id="modal-price">-</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="border border-slate-200 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Additional Information
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-slate-500 mb-1">Created Date</p>
                            <p class="text-sm font-medium text-slate-900" id="modal-created-date">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-1">Total Amount</p>
                            <p class="text-sm font-semibold text-green-500" id="modal-total-amount">-</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 px-6 py-4 rounded-b-2xl flex justify-end space-x-3">
                <button onclick="closeViewModal()"
                    class="px-6 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-lg transition-colors">
                    Close
                </button>
                <button
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    Take Action
                </button>
            </div>
        </div>
    </div>

    <script>
        function openViewModal(request) {

            document.getElementById('modal-request-id').textContent = '#RQ' + request.id;
            document.getElementById('modal-customer-name').textContent = request.user.name;
            document.getElementById('modal-customer-email').textContent = request.user.email || 'N/A';
            document.getElementById('modal-product-name').textContent = request.product_name;
            document.getElementById('modal-market-name').textContent = request.market_name;
            document.getElementById('modal-produt-url').setAttribute('href', request.product_url);
            document.getElementById('modal-quantity').textContent = request.quantity;
            document.getElementById('modal-price').textContent = '¥' + parseFloat(request.product_price).toLocaleString(
                'en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            document.getElementById('modal-created-date').textContent = new Date(request.created_at).toLocaleDateString(
                'en-GB');

            const total = request.quantity * request.product_price;
            document.getElementById('modal-total-amount').textContent = '¥' + total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });


            const statusBadge = document.getElementById('modal-status-badge');
            const status = request.status || 'new';
            const statusClasses = {
                'new': 'bg-blue-100 text-blue-800',
                'pending': 'bg-yellow-100 text-yellow-800',
                'processing': 'bg-purple-100 text-purple-800',
                'completed': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };
            statusBadge.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium capitalize ' + (
                statusClasses[status.toLowerCase()] || 'bg-gray-100 text-gray-800');
            statusBadge.textContent = status.charAt(0).toUpperCase() + status.slice(1);


            document.getElementById('view-modal').classList.remove('hidden');
            
        }

        function closeViewModal() {
            document.getElementById('view-modal').classList.add('hidden');
            document.getElementById('qoute-modal').classList.add('hidden');
        }

        function openQouteModal(request){
            document.getElementById('modal-request-name').textContent = request.product_name;
            document.getElementById('modal-request-market').textContent = request.market_name;
            document.getElementById('modal-request-quantity').textContent = request.quantity;
            document.getElementById('modal-request-url').setAttribute('href', request.product_url);
            document.getElementById('modal-request-notes-c').textContent = request.customer_notes || 'None';
            document.getElementById('qoute-modal').classList.remove('hidden');
        }


        document.getElementById('view-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeViewModal();
            }
        });


        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeViewModal();
            }
        });
    </script>

@endsection
