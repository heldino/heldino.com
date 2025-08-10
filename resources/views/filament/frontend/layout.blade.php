<!DOCTYPE html>
<html lang="fr" class="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Plateforme LMS - Gestion Bio-résonance' }}</title>
    
    @filamentStyles
    @vite('resources/css/filament/frontend/theme.css')
</head>
<body class="fi-body fi-panel-frontend antialiased">
    {{-- Header Navigation --}}
    <header class="frontend-nav">
        <div class="container">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <x-heroicon-o-book-open class="h-8 w-8 text-primary-600" />
                    <h1 class="text-xl font-bold text-gray-900">Gestion Bio-résonance</h1>
                </div>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/learnycool" class="text-primary-600 font-medium">Accueil</a>
                    <a href="/learnycool/formations" class="text-gray-700 hover:text-primary-600">Formations</a>
                    <a href="/" class="text-gray-700 hover:text-primary-600">Portfolio Heldino</a>
                    <x-filament::button
                        tag="a"
                        href="/learnycool/app"
                        size="sm"
                    >
                        Se connecter
                    </x-filament::button>
                </nav>
                
                {{-- Menu mobile --}}
                <div class="md:hidden">
                    <button class="text-gray-700" x-data x-on:click="$dispatch('open-modal', { id: 'mobile-menu' })">
                        <x-heroicon-o-bars-3 class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- Contenu principal --}}
    <main class="fi-main">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <x-heroicon-o-book-open class="h-6 w-6 text-primary-400" />
                        <h3 class="text-lg font-semibold">Gestion Bio-résonance</h3>
                    </div>
                    <p class="text-gray-400">
                        Plateforme de formation dédiée à la bio-résonance et aux techniques de vitalité.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens utiles</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="/learnycool/formations" class="hover:text-white">Formations</a></li>
                        <li><a href="/learnycool/app" class="hover:text-white">Se connecter</a></li>
                        <li><a href="/" class="hover:text-white">Portfolio Heldino</a></li>
                        <li><a href="#contact" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <div class="space-y-2 text-gray-400">
                        <p>Email: info@bioresonance-lms.com</p>
                        <p>Téléphone: +33 1 23 45 67 89</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Gestion Bio-résonance. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    {{-- Menu mobile modal --}}
    <x-filament::modal id="mobile-menu" width="sm">
        <x-slot name="heading">
            Menu
        </x-slot>
        
        <div class="space-y-4">
            <a href="/learnycool" class="block text-primary-600 font-medium">Accueil</a>
            <a href="/learnycool/formations" class="block text-gray-700 hover:text-primary-600">Formations</a>
            <a href="/" class="block text-gray-700 hover:text-primary-600">Portfolio Heldino</a>
            <x-filament::button
                tag="a"
                href="/learnycool/app"
                class="w-full"
            >
                Se connecter
            </x-filament::button>
        </div>
    </x-filament::modal>

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
