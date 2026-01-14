<div id="reject-modal" class=" hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
    
        <div class=" bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="bg-red-500 p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div class="">
                        <h2 class="text-2xl font-bold text-white">Reject the request</h2>
                        <p class="text-blue-100 text-sm mt-1">Fill the reason for customer</p>
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
                <form method="POST" action="{{ route('request.reject') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="request_id" value="{{ $requestproduct->id }}">
                    <div class="border border-slate-200 rounded-lg p-4">
                        <div class="space-y-2 md:col-span-2">
                            <label for="admin_notes" class="block mb-2.5 text-sm font-medium text-heading">
                                Your Message to Customers
                            </label>
                            <textarea id="admin_notes" name="admin_notes" rows="4"
                                class="bg-neutral-secondary-medium border rounded-xl border-default-medium text-heading
                                        text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5
                                        shadow-xs placeholder:text-body"
                                placeholder="Left a notes for customer...">
                            </textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-x-4 mt-4 ">
                        <button type="submit" class="bg-red-500 rounded-xl p-4 text-white font-semibold">Reject Request</button>
                    </div>
                </form>
            </div>

        </div>
    
    </form>
</div>
