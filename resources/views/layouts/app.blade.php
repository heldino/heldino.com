<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LearnyCool LMS')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom styles -->
    <style>
        .badge-success { @apply bg-green-100 text-green-800; }
        .badge-info { @apply bg-blue-100 text-blue-800; }
        .badge-warning { @apply bg-yellow-100 text-yellow-800; }
        .badge-secondary { @apply bg-gray-100 text-gray-800; }
        .badge-light { @apply bg-gray-50 text-gray-600; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('learnycool.dashboard') }}" class="text-xl font-bold text-blue-600">
                        LearnyCool
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('learnycool.dashboard') }}" class="text-gray-900 hover:text-blue-600 font-medium">
                        Dashboard
                    </a>
                </div>
                
                <!-- User Menu -->
                @auth
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ auth()->user()->name ?? auth()->user()->email }}</span>
                    @if(Route::has('logout'))
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                Se déconnecter
                            </button>
                        </form>
                    @else
                        <a href="/logout" class="text-gray-500 hover:text-gray-700">Se déconnecter</a>
                    @endif
                </div>
                @else
                <div class="flex items-center space-x-4">
                    @if(Route::has('login'))
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Se connecter</a>
                    @else
                        <a href="/login" class="text-gray-700 hover:text-blue-600">Se connecter</a>
                    @endif
                    
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            S'inscrire
                        </a>
                    @else
                        <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            S'inscrire
                        </a>
                    @endif
                </div>
                @endauth
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-white border-t mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} LearnyCool. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            document.querySelectorAll('[class*="fixed bottom-4"]').forEach(function(el) {
                el.style.opacity = '0';
                setTimeout(function() { el.remove(); }, 300);
            });
        }, 5000);
    </script>
</body>
</html>