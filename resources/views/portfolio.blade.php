<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heldino - Développeur Full Stack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">H</span>
                    </div>
                    <h1 class="text-xl font-bold text-gray-900">Heldino</h1>
                </div>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="text-gray-700 hover:text-blue-600">À propos</a>
                    <a href="#projects" class="text-gray-700 hover:text-blue-600">Projets</a>
                    <a href="#skills" class="text-gray-700 hover:text-blue-600">Compétences</a>
                    <a href="/learnycool" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        LMS Platform
                    </a>
                </nav>
                
                <!-- Menu mobile -->
                <div class="md:hidden">
                    <button class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 to-purple-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Salut, je suis <br>
                <span class="text-blue-200">Heldino</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Développeur Full Stack passionné par les technologies modernes et l'innovation
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#projects" 
                   class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                    Voir mes projets
                </a>
                <a href="#contact" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Me contacter
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">À propos de moi</h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg text-gray-600 mb-6">
                        Je suis un développeur full stack avec une passion pour créer des solutions innovantes. 
                        Spécialisé dans les technologies web modernes, je conçois et développe des applications 
                        robustes et intuitives.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Mon expertise couvre le développement frontend et backend, avec une attention particulière 
                        portée à l'expérience utilisateur et aux performances.
                    </p>
                </div>
                <div class="bg-gray-100 rounded-lg p-8">
                    <h3 class="text-xl font-semibold mb-4">Ce que je fais</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <span class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">💻</span>
                            Développement d'applications web
                        </li>
                        <li class="flex items-center">
                            <span class="bg-green-100 text-green-600 p-2 rounded-full mr-3">⚡</span>
                            Optimisation des performances
                        </li>
                        <li class="flex items-center">
                            <span class="bg-purple-100 text-purple-600 p-2 rounded-full mr-3">🎨</span>
                            Design d'interfaces utilisateur
                        </li>
                        <li class="flex items-center">
                            <span class="bg-yellow-100 text-yellow-600 p-2 rounded-full mr-3">🔧</span>
                            Architecture système
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section id="projects" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Projets Phares</h2>
                <p class="text-xl text-gray-600">Découvrez quelques-uns de mes travaux récents</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- LearnyCool LMS -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">LearnyCool LMS</h3>
                        <p class="text-gray-600 mb-4">
                            Plateforme d'apprentissage moderne pour la formation en bio-résonance avec système de modules et suivi de progression.
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded">Laravel</span>
                            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs rounded">Filament</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-600 text-xs rounded">Tailwind CSS</span>
                        </div>
                        
                        <a href="/learnycool" 
                           class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Découvrir la plateforme
                        </a>
                    </div>
                </div>

                <!-- Projet Portfolio -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Portfolio Personnel</h3>
                        <p class="text-gray-600 mb-4">
                            Site portfolio moderne avec animations fluides et design responsive pour présenter mon travail et mes compétences.
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-orange-100 text-orange-600 text-xs rounded">HTML5</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded">CSS3</span>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-600 text-xs rounded">JavaScript</span>
                        </div>
                        
                        <a href="#" 
                           class="block w-full bg-gray-600 text-white text-center py-3 rounded-lg hover:bg-gray-700 transition-colors">
                            Voir le projet
                        </a>
                    </div>
                </div>

                <!-- Projet E-commerce -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Boutique E-commerce</h3>
                        <p class="text-gray-600 mb-4">
                            Application e-commerce complète avec gestion des stocks, paiements sécurisés et interface d'administration.
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-red-100 text-red-600 text-xs rounded">Laravel</span>
                            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs rounded">Vue.js</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded">MySQL</span>
                        </div>
                        
                        <a href="#" 
                           class="block w-full bg-gray-600 text-white text-center py-3 rounded-lg hover:bg-gray-700 transition-colors">
                            Voir le projet
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Compétences Techniques</h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Backend</h3>
                    <p class="text-gray-600 text-sm">Laravel, PHP, Node.js, Python</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🎨</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Frontend</h3>
                    <p class="text-gray-600 text-sm">Vue.js, React, Tailwind CSS, Alpine.js</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💾</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Base de données</h3>
                    <p class="text-gray-600 text-sm">MySQL, PostgreSQL, SQLite</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🚀</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">DevOps</h3>
                    <p class="text-gray-600 text-sm">Docker, Git, CI/CD, Linux</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-blue-600 text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Travaillons ensemble</h2>
            <p class="text-xl mb-8 text-blue-100">
                Vous avez un projet en tête ? Contactez-moi et discutons de vos besoins
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:contact@heldino.com" 
                   class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                    M'envoyer un email
                </a>
                <a href="/learnycool" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Découvrir LearnyCool
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="bg-blue-600 w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">H</span>
                        </div>
                        <span class="text-xl font-bold">Heldino</span>
                    </div>
                    <p class="text-gray-400">
                        Développeur Full Stack passionné par l'innovation et les technologies modernes
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigation</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#about" class="hover:text-white">À propos</a></li>
                        <li><a href="#projects" class="hover:text-white">Projets</a></li>
                        <li><a href="#skills" class="hover:text-white">Compétences</a></li>
                        <li><a href="/learnycool" class="hover:text-white">LearnyCool LMS</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>contact@heldino.com</li>
                        <li>LinkedIn: /in/heldino</li>
                        <li>GitHub: @heldino</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Heldino. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>