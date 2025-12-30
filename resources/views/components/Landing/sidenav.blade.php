 <aside
     class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
     aria-expanded="false">

     {{-- Logo --}}
     <div class="h-19">
         {{-- <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
             sidenav-close></i> --}}
         <a class=" px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700 flex justify-center items-center"
             href="/" target="_blank">

             {{-- Untuk Darkmode --}}
             <img src="./img/logoshoppyJapan.png"
                 class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                 alt="main_logo" />
             <img src="./img/logoshoppyJapan.png"
                 class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                 alt="main_logo" />

         </a>
     </div>

     <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

     <div class="items-center block w-auto max-h-screen overflow-auto h-[calc(100vh - 360px)] grow basis-full">
         <ul class="flex flex-col pl-0 mb-0">
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg  px-4 py-3 font-semibold text-slate-700 transition-colors bg-[#EAEDFC]"
                     href="/">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg ">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-blue-500"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8 6.11861L9.4131 4.70551L11.5371 6.82954L14.3667 4L15.7782 5.41151L13.3137 7.87598H18C19.1046 7.87598 20 8.77141 20 9.87598V16.876C20 17.9805 19.1046 18.876 18 18.876H6C4.89543 18.876 4 17.9805 4 16.876V9.87598C4 8.77141 4.89543 7.87598 6 7.87598H9.75736L8 6.11861ZM18 9.87598H6V16.876H18V9.87598Z"
                                 fill="currentColor" />
                             <path d="M8 19.876H16V20.876H8V19.876Z" fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm ">Dashboard</span>
                 </a>
             </li>

             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg bg-blue-500/13 px-4 py-3 font-semibold text-slate-700 transition-colors "
                     href="/">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg ">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-[#FB6340]"
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
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg bg-blue-500/13 px-4 py-3 font-semibold text-slate-700 transition-colors "
                     href="/">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg ">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-emerald-500"
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
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg bg-blue-500/13 px-4 py-3 font-semibold text-slate-700 transition-colors "
                     href="/">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg ">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-cyan-500"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M4 9C4 8.44772 4.44772 8 5 8H9C9.55228 8 10 8.44772 10 9C10 9.55228 9.55228 10 9 10H5C4.44772 10 4 9.55228 4 9Z"
                                 fill="currentColor" />
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M4 3C1.79086 3 0 4.79086 0 7V17C0 19.2091 1.79086 21 4 21H20C22.2091 21 24 19.2091 24 17V7C24 4.79086 22.2091 3 20 3H4ZM20 5H4C2.89543 5 2 5.89543 2 7V14H22V7C22 5.89543 21.1046 5 20 5ZM22 16H2V17C2 18.1046 2.89543 19 4 19H20C21.1046 19 22 18.1046 22 17V16Z"
                                 fill="currentColor" />
                         </svg>
                     </div>
                     <span class="text-sm opacity-100">Payment</span>
                 </a>
             </li>
             <li class="mt-0.5 w-full">
                 <a class="my-2 mx-2 flex items-center gap-3 rounded-lg bg-blue-500/13 px-4 py-3 font-semibold text-slate-700 transition-colors "
                     href="/banner">
                     <div class="flex h-8 w-8 items-center justify-center rounded-lg ">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-orange-500"
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
         </ul>
     </div>

     <div class="mx-4">

         <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border"
             sidenav-card>
             <img class="w-1/2 mx-auto" src="./img/illustrations/icon-documentation.svg" alt="sidebar illustrations" />
             <div class="flex-auto w-full p-4 pt-0 text-center">
                 <div class="transition-all duration-200 ease-nav-brand">
                     <h6 class="mb-0 text-[#000000]">Need help?</h6>
                     <p class="mb-0 text-xs font-semibold leading-tight text-[#67748E] ">Please check
                         Shopan User Manual</p>
                 </div>
             </div>
         </div>
         <a href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/"
             target="_blank"
             class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Shopan
             User Manual</a>

         <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px"
             href="https://www.creative-tim.com/product/argon-dashboard-pro-tailwind?ref=sidebarfree"
             >Logout</a>
     </div>
 </aside>
