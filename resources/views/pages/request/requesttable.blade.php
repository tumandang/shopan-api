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
                                        <th  class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Price
                                        </th>
                                        <th class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
                                            Status
                                        </th>
                                        <th  class="px-6 py-4 font-semibold text-center uppercase align-middle border-b-2 border-slate-200 text-slate-600 text-xs tracking-wide whitespace-nowrap">
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
                                                <span  class="text-sm text-slate-700">{{ $requestproduct->market_name }}</span>
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
                                                    $statusClasses = match (strtolower($status)) {
                                                        'new' => 'bg-blue-100 text-blue-800',
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'processing' => 'bg-purple-100 text-purple-800',
                                                        'completed' => 'bg-green-100 text-green-800',
                                                        'cancelled' => 'bg-red-100 text-red-800',
                                                        'reject' => 'bg-red-100 text-red-800',
                                                        default => 'bg-gray-100 text-gray-800',
                                                    };
                                                @endphp
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $statusClasses }} capitalize">
                                                    {{ $requestproduct->status }}
                                                </span>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="text-sm text-slate-600">{{ $requestproduct->created_at->format('d/m/Y') }}</span>
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

                                                        <button onclick="openQouteModal({{ json_encode($requestproduct) }})"
                                                            class="p-2 bg-green-100 hover:bg-green-200 text-green-600 rounded-lg transition-colors"
                                                            title="Quote Price">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m1.5 9 2.25 3m0 0 2.25-3m-2.25 3v4.5M9.75 15h4.5m-4.5 2.25h4.5m-3.75-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                            </svg>
                                                        </button>
                                                        
                                                        <button onclick="openRejectModal({{ json_encode($requestproduct) }})"
                                                            class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors"
                                                            title="Reject">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                        
                                                    @endif

                                                    @if ($requestproduct->status === 'quoted')
                                                        <button onclick="openViewModal({{ json_encode($requestproduct) }})"
                                                            class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors"
                                                            title="View">
                                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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


                                                    @if ($requestproduct->status === 'cancelled')
                                                        <form action="{{ route('request.delete', $requestproduct->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure you want to delete this request?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors"
                                                                title="Reject">
                                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>
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

    @include('pages.request.modals.viewmodal')
    @include('pages.request.modals.qoutemodal')
    @include('pages.request.modals.rejectmodal')
    @push('scripts')
        <script src="{{ asset('js/modals/requestmodal.js') }}"></script>
    @endpush
@endsection
