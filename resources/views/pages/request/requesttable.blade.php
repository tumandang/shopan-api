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
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border border-slate-200 shadow-lg rounded-2xl">
                    
                    
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
                                        <th class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Request ID
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Customer
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Product
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-left uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Market
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Quantity
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Price
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Status
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Date
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ($requestproducts as $requestproduct)
                                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm font-medium text-slate-900">#RQ{{ $requestproduct->id }}</span>
                                            </td>
                                            
                                           
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                                        <span class="text-white text-xs font-semibold">{{ strtoupper(substr($requestproduct->user->name, 0, 1)) }}</span>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-slate-900">{{ $requestproduct->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                           
                                            <td class="px-6 py-4">
                                                <p class="text-sm text-slate-900 font-medium">{{ Str::limit($requestproduct->product_name, 15, '...')  }}</p>
                                            </td>
                                            
                                           
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm text-slate-700">{{ $requestproduct->market_name }}</span>
                                            </td>
                                            
                                        
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-800">
                                                    {{ $requestproduct->quantity }}
                                                </span>
                                            </td>
                                            
                                       
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="text-sm font-semibold text-slate-900">¥{{ number_format($requestproduct->product_price, 2) }}</span>
                                            </td>
                                            
                                         
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @php
                                                    $status = $requestproduct->status ?? 'New';
                                                    $statusClasses = match(strtolower($status)) {
                                                        'new' => 'bg-blue-100 text-blue-800',
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'processing' => 'bg-purple-100 text-purple-800',
                                                        'completed' => 'bg-green-100 text-green-800',
                                                        'cancelled' => 'bg-red-100 text-red-800',
                                                        default => 'bg-gray-100 text-gray-800',
                                                    };
                                                @endphp
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $statusClasses }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                            
                                           
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="text-sm text-slate-600">{{ $requestproduct->created_at->format('d/m/Y') }}</span>
                                            </td>
                                            
                                            
                                            <td class="px-6 py-4 flex flex-col space-y-2 whitespace-nowrap text-center">
                                                <a href="/" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 shadow-sm hover:shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>

                                                    View
                                                </a>

                                                <a href="/" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 shadow-sm hover:shadow-md">
                                                <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>


                                                    Edit
                                                </a>

                                                <a href="/" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 shadow-sm hover:shadow-md">
                                                    <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <!-- Empty State -->
                            @if(count($requestproducts) == 0)
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-slate-900">No requests</h3>
                                    <p class="mt-1 text-sm text-slate-500">Get started by creating a new request.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection