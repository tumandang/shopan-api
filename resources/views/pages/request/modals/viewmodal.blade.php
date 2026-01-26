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
                    <div id="modal-product-image" class="row-span-3 border-2 border-dashed border-slate-300 bg-slate-100 rounded-lg overflow-hidden">
                        
                        <div class="h-full flex flex-col items-center justify-center p-4 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <p class="text-sm font-medium">No Image</p>
                        </div>
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
            </div>
        </div>
    </div>

