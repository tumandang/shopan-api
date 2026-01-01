<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShopanAdmin | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Sora', 'sans-serif'],
                    },
                    colors: {
                        'brand': '#FF8133',
                        'brand-light': '#FF9A56',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen overflow-hidden">
    <div class="grid lg:grid-cols-2 min-h-screen">
        <div class=" lg:flex items-center justify-center ">
            <div class="w-full h-full  rounded-r-3xl overflow-hidden  group">
                <img 
                    src="./img/loginshopan.png" 
                    alt="Shopan Admin Dashboard Preview" 
                    class="w-full h-full object-cover  scale-125"
                />
            </div>
        </div>
        <div class="flex items-center justify-center px-8 py-12 lg:px-16">
            <div class="w-full max-w-md space-y-8">
      
                <div class="animate-fade-in opacity-0" style="animation-delay: 0.1s; animation-fill-mode: forwards;">
                    <div class="inline-block px-4 py-2 bg-brand bg-opacity-10 rounded-full mb-4">
                        <span class="text-brand font-semibold text-sm tracking-wide">ADMIN SHOPAN PORTAL</span>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                    <p class="text-gray-500 text-base">Sign in to manage your dashboard</p>
                </div>

         
                <form class="space-y-5 mt-10" action="{{ route('logmasuk.admin') }}" method="POST">
                    @csrf
                    <div class="animate-fade-in opacity-0" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input 
                            name="email"
                            id="email"
                            type="email" 
                            placeholder="admin@shopan.com"
                            class="w-full px-5 py-3.5 rounded-xl border-2 border-gray-200 text-gray-900 placeholder-gray-400 transition-all duration-200 focus:outline-none focus:border-brand focus:ring-4 focus:ring-brand focus:ring-opacity-10"
                            required
                        />
                    </div>

         
                    <div class="animate-fade-in opacity-0" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input 
                            id="password"
                            name="password"
                            type="password" 
                            placeholder="Enter your password"
                            class="w-full px-5 py-3.5 rounded-xl border-2 border-gray-200 text-gray-900 placeholder-gray-400 transition-all duration-200 focus:outline-none focus:border-brand focus:ring-4 focus:ring-brand focus:ring-opacity-10"
                            required
                        />
                    </div>
               
                    <button type="submit" class="w-full bg-gradient-to-r from-brand to-brand-light text-white font-semibold py-4 rounded-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-brand/40 active:translate-y-0 animate-fade-in opacity-0"
                        style="animation-delay: 0.5s; animation-fill-mode: forwards;" >
                        Sign In
                    </button>
                </form>
                @if (session('gagal'))
                  <p class="text-red-600 text-center " >{{ session('gagal') }}</p>
                @endif

                
                <div class="text-center pt-6 animate-fade-in opacity-0" style="animation-delay: 0.5s; animation-fill-mode: forwards;">
                    <p class="text-sm text-gray-500">
                        Protected by ZNN Technology security
                    </p>
                </div>
            </div>
        </div>

       

    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>
</body>

</html>