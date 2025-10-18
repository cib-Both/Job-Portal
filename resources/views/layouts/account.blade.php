<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles & Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <script>
      if (
        localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
      ) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    </script>
<body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-blue-950 dark:to-indigo-950 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Large Blobs -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-400 dark:bg-blue-600 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-xl opacity-40 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-cyan-300 dark:bg-cyan-600 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-400 dark:bg-indigo-600 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-xl opacity-35 animate-blob animation-delay-4000"></div>
        
        <!-- Medium Blobs -->
        <div class="absolute top-1/3 right-1/4 w-48 h-48 bg-purple-300 dark:bg-purple-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-2xl opacity-25 animate-blob-reverse"></div>
        <div class="absolute bottom-1/4 right-10 w-56 h-56 bg-sky-300 dark:bg-sky-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-xl opacity-30 animate-blob animation-delay-3000"></div>
        
        <!-- Small Accent Blobs -->
        <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-blue-200 dark:bg-blue-800 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-2xl opacity-40 animate-float"></div>
        <div class="absolute bottom-1/3 left-1/3 w-40 h-40 bg-indigo-300 dark:bg-indigo-800 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-2xl opacity-20 animate-float animation-delay-1000"></div>
        
        <!-- Floating Particles -->
        <div class="absolute top-1/4 left-1/2 w-3 h-3 bg-blue-400 dark:bg-blue-500 rounded-full opacity-60 animate-particle"></div>
        <div class="absolute top-2/3 left-2/3 w-2 h-2 bg-cyan-400 dark:bg-cyan-500 rounded-full opacity-50 animate-particle animation-delay-2000"></div>
        <div class="absolute top-1/2 right-1/3 w-2 h-2 bg-indigo-400 dark:bg-indigo-500 rounded-full opacity-70 animate-particle animation-delay-4000"></div>
        <div class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-purple-400 dark:bg-purple-500 rounded-full opacity-40 animate-particle animation-delay-1000"></div>
        
        <!-- Gradient Orbs -->
        <div class="absolute top-10 right-1/3 w-64 h-64 bg-gradient-to-br from-blue-300 to-indigo-400 dark:from-blue-900 dark:to-indigo-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse-slow"></div>
        <div class="absolute bottom-20 left-1/3 w-56 h-56 bg-gradient-to-tr from-cyan-300 to-blue-400 dark:from-cyan-900 dark:to-blue-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-25 animate-pulse-slow animation-delay-3000"></div>
    </div>

    <!-- Centered Card Container -->
    <main class="w-full max-w-xl relative z-10">
        @yield('content')
    </main>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @stack('scripts')

    <style>
        /* Blob Animation */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        
        /* Reverse Blob Animation */
        @keyframes blob-reverse {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(-30px, 50px) scale(0.9);
            }
            66% {
                transform: translate(20px, -20px) scale(1.1);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        
        /* Float Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(-20px) translateX(10px);
            }
        }
        
        /* Particle Animation */
        @keyframes particle {
            0% {
                transform: translateY(0px) scale(1);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) scale(0.5);
                opacity: 0;
            }
        }
        
        /* Slow Pulse Animation */
        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.3;
                transform: scale(1.05);
            }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animate-blob-reverse {
            animation: blob-reverse 8s infinite;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-particle {
            animation: particle 8s ease-in infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }
        
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-3000 {
            animation-delay: 3s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>
</html>
