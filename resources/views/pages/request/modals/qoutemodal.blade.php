<div id="qoute-modal" class=" hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
    <div class=" bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto">

        <div class="bg-green-500 p-6 rounded-t-2xl">
            <div class="flex justify-between items-center">
                <div class="">
                    <h2 class="text-2xl font-bold text-white">Qoute Price Form</h2>
                    <p class="text-blue-100 text-sm mt-1">Fill the qoute price form to inform the customer</p>
                </div>
                <button onclick="closeViewModal()" class="text-white hover:bg-white/20 rounded-lg p-2 transition-colors">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <form method="POST"  action="{{ route('request.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="request_id" value="{{ $requestproduct->id }}">
                <div class="border border-slate-200 rounded-lg p-4 mb-3">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-orange-600 " xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                        Request Details
                    </h3>
                    <div class=" grid grid-flow-col grid-cols-2 gap-4">
                        <div
                            class="row-span-3 border-2 border-dashed border-slate-300 bg-slate-100 p-4 rounded-lg flex justify-center items-center gap-x-3">
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
                            <a href="" target="_blank" class="text-xs font-medium text-slate-900 italic underline"
                                id="modal-request-url">Click This Link</a>
                        </div>
                        <div class="bg-slate-100 p-4 rounded-lg col-span-2 ">
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Quantity</p>
                            <p class="text-xs font-medium text-slate-900" id="modal-request-quantity">-</p>
                        </div>
                    </div>
                </div>
                <div class="border border-slate-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-600 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m1.5 9 2.25 3m0 0 2.25-3m-2.25 3v4.5M9.75 15h4.5m-4.5 2.25h4.5m-3.75-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            Quote Form
                        </h3>
                        <p class="text-sm italic text-slate-700 mb-3 flex items-center">
                            Rate: 1 JPY = 0.026 MYR
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Item Price
                            </label>
                            <input type="text" name="price" id="price-product" value="-" disabled
                                class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed">
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Japan Domestic Shipping
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">¥</span>
                                    <input type="number" name="domestic_shipping" placeholder="800" id="domestic-ship" class="w-full pl-8 pr-4 py-2.5 border border-gray-300 rounded-lg  focus:border-transparent transition">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Proxy Service Fee
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">¥</span>
                                    <input type="number" name="service_fee" placeholder="800" id="proxy-fee"
                                        class="w-full pl-8 pr-4 py-2.5 border border-gray-300 rounded-lg  focus:border-transparent transition">
                                </div>
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label for="admin_notes" class="block mb-2.5 text-sm font-medium text-heading">
                                    Your Message to Customers
                                </label>
                                <textarea id="admin_notes" name="admin_notes" rows="4"
                                    class="bg-neutral-secondary-medium border rounded-xl border-default-medium text-heading
                                    text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5
                                    shadow-xs placeholder:text-body" placeholder="Left a notes for customer...">
                                </textarea>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-200 space-y-4">
                            <div class="flex justify-between items-center bg-green-50 rounded-lg p-4">
                                <span class="text-base font-semibold text-gray-800">Estimated Total</span>
                                <span class="text-xl font-bold text-green-600" id="estimate_price"></span>
                            </div>
                            <div class="flex justify-between items-center bg-orange-50 rounded-lg p-4">
                                <span class="text-base font-semibold text-gray-800">Estimated MYR</span>
                                <span class="text-xl font-bold text-orange-600" id="convert"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-4 mt-4">
                    <button type="submit" class="bg-green-500 rounded-xl p-4 text-white font-semibold">Send Qoute Price</button>
                </div>
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800 mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
