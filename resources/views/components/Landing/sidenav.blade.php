<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased bg-white border border-gray-200 shadow-xl max-w-64 ease-nav-brand"
     aria-expanded="false">
   
     <div class="h-19">
         <a class="px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700 flex justify-center items-center"
             href="/" target="_blank">
             <img src="./img/logoshoppyJapan.png"
                 class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                 alt="main_logo" />
         </a>
     </div>

     <div class="items-center block w-auto max-h-screen overflow-auto h-[calc(100vh - 360px)] grow basis-full overflow-x-hidden">
         <ul class="flex flex-col pl-0 mb-0">
    
        
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors {{ request()->is('dashboard') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}"
                     href="/dashboard">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="{{ request()->is('dashboard') ? 'text-blue-500' : 'text-slate-500' }}"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8 6.11861L9.4131 4.70551L11.5371 6.82954L14.3667 4L15.7782 5.41151L13.3137 7.87598H18C19.1046 7.87598 20 8.77141 20 9.87598V16.876C20 17.9805 19.1046 18.876 18 18.876H6C4.89543 18.876 4 17.9805 4 16.876V9.87598C4 8.77141 4.89543 7.87598 6 7.87598H9.75736L8 6.11861ZM18 9.87598H6V16.876H18V9.87598Z"
                                 fill="currentColor" />
                             <path d="M8 19.876H16V20.876H8V19.876Z" fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm">Dashboard</span>
                 </a>
             </li>

        
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors {{ request()->is('request') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}"
                     href="/request">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="{{ request()->is('request') ? 'text-[#FB6340]' : 'text-slate-500' }}"
                             xmlns="http://www.w3.org/2000/svg">
                             <path d="M7 18H17V16H7V18Z" fill="currentColor" />
                             <path d="M17 14H7V12H17V14Z" fill="currentColor" />
                             <path d="M7 10H11V8H7V10Z" fill="currentColor" />
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z"
                                 fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm opacity-100">Requests</span>
                 </a>
             </li>

       
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors {{ request()->is('order') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}"
                     href="/order">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="{{ request()->is('order') ? 'text-emerald-500' : 'text-slate-500' }}"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M10 12C9.44769 12 9 12.4477 9 13C9 13.5523 9.44769 14 10 14H14C14.5522 14 15 13.5523 15 13C15 12.4477 14.5522 12 14 12H10Z"
                                 fill="currentColor" />
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M4 2C2.34314 2 1 3.34314 1 5V19C1 20.6569 2.34314 22 4 22H20C21.6569 22 23 20.6569 23 19V5C23 3.34314 21.6569 2 20 2H4ZM20 4H4C3.44769 4 3 4.44769 3 5V8H21V5C21 4.44769 20.5522 4 20 4ZM3 19V10H21V19C21 19.5523 20.5522 20 20 20H4C3.44769 20 3 19.5523 3 19Z"
                                 fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm opacity-100">Orders</span>
                 </a>
             </li>

      
             <li class="mt-0.5 w-full">
                 <div x-data="{ open: {{ request()->is('marketplace*') || request()->is('categories*') || request()->is('vendor*') ? 'true' : 'false' }} }">
                    
                     <button @click="open = !open" 
                         class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors w-full {{ request()->is('marketplace*') || request()->is('categories*') || request()->is('vendor*') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}">
                         <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                 class="size-6 {{ request()->is('marketplace*') || request()->is('categories*') || request()->is('vendor*') ? 'text-yellow-500' : 'text-slate-500' }}">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                             </svg>
                         </div>
                         <span class="text-sm opacity-100 flex-1 text-left">Marketplace</span>
                         <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                         </svg>
                     </button>

       
                     <ul x-show="open" x-collapse class="pl-4 space-y-1">
                      
                         <li class="mt-0.5 w-full">
                             <a class="my-1 mx-2 flex items-center gap-3 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition-colors {{ request()->is('categories*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100' }}"
                                 href="/categories">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                </svg>

                                 <span>Categories</span>
                             </a>
                         </li>

               
                         <li class="mt-0.5 w-full">
                             <a class="my-1 mx-2 flex items-center gap-3 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition-colors {{ request()->is('vendor*') ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100' }}"
                                 href="/marketplaces">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>

                                 <span>Vendors</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors {{ request()->is('banner*') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}"
                     href="/banner">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="{{ request()->is('banner*') ? 'text-orange-500' : 'text-slate-500' }}"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M9.14648 12.2929C8.36544 11.5118 8.36544 10.2455 9.14648 9.46444C9.92753 8.68339 11.1939 8.68339 11.9749 9.46444L12 9.48955L12.0251 9.46449C12.8061 8.68345 14.0725 8.68345 14.8535 9.46449C15.6346 10.2455 15.6346 11.5119 14.8535 12.2929L12.0251 15.1213L12 15.0962L11.9749 15.1213L9.14648 12.2929Z"
                                 fill="currentColor" />
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M3 4C3 2.34315 4.34315 1 6 1H18C19.6569 1 21 2.34315 21 4V20C21 21.6569 19.6569 23 18 23H6C4.34315 23 3 21.6569 3 20V4ZM6 3H18C18.5523 3 19 3.44772 19 4V20C19 20.5523 18.5523 21 18 21H6C5.44772 21 5 20.5523 5 20V4C5 3.44772 5.44772 3 6 3Z"
                                 fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm opacity-100">Banner</span>
                 </a>
             </li>
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg px-4 py-3 font-semibold text-slate-700 transition-colors {{ request()->is('announcement*') ? 'bg-[#EAEDFC]' : 'bg-blue-500/13' }}"
                     href="/banner">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->is('announcement*') ? 'text-purple-500' : 'text-slate-500' }} w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                        </svg>

                     </div>
                     <span class="text-sm opacity-100">Announcement</span>
                 </a>
             </li>
         </ul>
     </div>

     <div class="mx-4">
         <a href="/"
             target="_blank"
             class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Shopan
             User Manual</a>

         <form method="POST" action="{{ route('logout.admin') }}">
            @csrf
            <button type="submit" class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px">
                Logout
            </button>
         </form>
     </div>
 </aside>