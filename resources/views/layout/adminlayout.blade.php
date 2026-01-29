<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ShopanAdmin | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-[#F6F7F8] text-slate-500">

    <x-Landing.sidenav></x-Landing.sidenav>

    <main class="relative h-full max-h-screen xl:ml-64">
        <div class="w-full mx-auto">
             @yield('content')
             @stack('scripts')
        </div>
    </main>
    @include('sweetalert::alert')
    
</body>
</html>