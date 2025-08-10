<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnyCool LMS - Plateforme d'Apprentissage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-gray-500 hover:text-gray-700 mr-4">← Retour</a>
                    <a href="/learnycool" class="text-xl font-bold text-blue-600">LearnyCool</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="/test-login" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Accès Dashboard (Test)
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 to-purple-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                <span class="text-blue-200">LearnyCool</span><br>
                LMS Platform
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Plateforme d'apprentissage moderne pour la formation professionnelle
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/test-login" 
                   class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                    Accéder au Dashboard
                </a>
                <a href="#features" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Découvrir les fonctionnalités
                </a>
            </div>
        </div>
    </section>
    
    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Fonctionnalités</h2>
                <p class="text-xl text-gray-600">Une plateforme complète pour l'apprentissage</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📚</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Gestion de Programmes</h3>
                    <p class="text-gray-600">Créez et organisez vos programmes d'apprentissage avec modules et leçons</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📊</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Suivi de Progression</h3>
                    <p class="text-gray-600">Suivez les progrès des apprenants en temps réel</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Gamification</h3>
                    <p class="text-gray-600">Badges, XP et classements pour motiver l'apprentissage</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Prêt à commencer ?</h2>
            <p class="text-xl mb-8 text-blue-100">
                Découvrez la puissance de notre plateforme d'apprentissage
            </p>
            <a href="/test-login" 
               class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                Accéder au Dashboard
            </a>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} LearnyCool LMS - Développé par Heldino</p>
        </div>
    </footer>
</body>
</html>