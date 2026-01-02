<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ShopanAdmin | @yield('title', 'Dashboard')</title>
</head>
<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-[#F6F7F8] text-slate-500">
    <div class="absolute w-full bg-[#FF8133] min-h-[300px]"></div>
    <x-Landing.sidenav></x-Landing.sidenav>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-72 rounded-xl">
        <div class="w-full px-6 py-6 mx-auto">
             @yield('content')
             @stack('scripts')
        </div>
    </main>
    @include('sweetalert::alert')
    
</body>
</html>