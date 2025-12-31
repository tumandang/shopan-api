<div class="flex items-center justify-between w-full px-6 py-4 mx-auto bg-white rounded-xl shadow-sm mb-6">
    
    <div class="flex items-center space-x-2">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <span class="text-sm font-medium text-gray-600">Dashboard</span>
    </div>
    
    
    <div class="flex items-center space-x-3">
        <div class="text-right">
            <p class="text-sm text-gray-500">Welcome back,</p>
            <h1 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</h1>
        </div>
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF8133] to-[#FF9A56] flex items-center justify-center text-white font-semibold">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    </div>
</div>