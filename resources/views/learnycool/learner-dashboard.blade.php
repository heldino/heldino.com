@extends('layouts.app')

@section('title', 'Dashboard Apprenant - LearnyCool')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Dashboard -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Tableau de Bord</h1>
                    <p class="text-gray-600">Bienvenue {{ auth()->user()->name ?? auth()->user()->username }}</p>
                </div>
                
                <!-- Statistiques rapides -->
                <div class="hidden md:flex space-x-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $stats['total_enrolled'] }}</div>
                        <div class="text-xs text-gray-500">Programmes</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $stats['completed'] }}</div>
                        <div class="text-xs text-gray-500">Terminés</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-purple-600">{{ $stats['total_xp'] }}</div>
                        <div class="text-xs text-gray-500">XP Total</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Mes Programmes en cours -->
        @if($enrolledProgrammes->count() > 0)
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Mes Programmes en Cours</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enrolledProgrammes as $enrollment)
                    @php $programme = $enrollment->programme; @endphp
                    <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
                        @if($programme->cover_image_url)
                            <img src="{{ $programme->cover_image_url }}" alt="{{ $programme->title }}" class="w-full h-32 object-cover rounded-t-lg">
                        @else
                            <div class="w-full h-32 bg-gradient-to-br from-blue-400 to-purple-500 rounded-t-lg flex items-center justify-center">
                                <span class="text-white text-lg font-semibold">{{ substr($programme->title, 0, 2) }}</span>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $programme->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($programme->short_description, 80) }}</p>
                            
                            <!-- Progression -->
                            <div class="mb-3">
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Progression</span>
                                    <span>{{ number_format($enrollment->progress_percentage, 0) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $enrollment->progress_percentage }}%"></div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $enrollment->getProgressBadgeClass() }}">
                                    {{ $enrollment->status_label }}
                                </span>
                                <a href="{{ route('learnycool.programme.show', $programme) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Continuer →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Filtres et Recherche -->
        <div class="bg-white rounded-lg shadow-sm border p-6 mb-6">
            <form method="GET" class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-64">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Rechercher un programme..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
                
                <select name="difficulty" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Tous niveaux</option>
                    <option value="1" {{ request('difficulty') == '1' ? 'selected' : '' }}>Débutant</option>
                    <option value="2" {{ request('difficulty') == '2' ? 'selected' : '' }}>Facile</option>
                    <option value="3" {{ request('difficulty') == '3' ? 'selected' : '' }}>Intermédiaire</option>
                    <option value="4" {{ request('difficulty') == '4' ? 'selected' : '' }}>Avancé</option>
                    <option value="5" {{ request('difficulty') == '5' ? 'selected' : '' }}>Expert</option>
                </select>
                
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Filtrer
                </button>
                
                @if(request()->hasAny(['search', 'category', 'difficulty']))
                    <a href="{{ route('learnycool.dashboard') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Effacer
                    </a>
                @endif
            </form>
        </div>

        <!-- Programmes Disponibles -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Programmes Disponibles</h2>
            
            @if($availableProgrammes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($availableProgrammes as $programme)
                        <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
                            @if($programme->cover_image_url)
                                <img src="{{ $programme->cover_image_url }}" alt="{{ $programme->title }}" class="w-full h-32 object-cover rounded-t-lg">
                            @else
                                <div class="w-full h-32 bg-gradient-to-br from-blue-400 to-purple-500 rounded-t-lg flex items-center justify-center">
                                    <span class="text-white text-lg font-semibold">{{ substr($programme->title, 0, 2) }}</span>
                                </div>
                            @endif
                            
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-gray-900">{{ $programme->title }}</h3>
                                    @if(!$programme->is_free)
                                        <span class="text-green-600 font-semibold">{{ $programme->price }}€</span>
                                    @else
                                        <span class="text-green-600 text-sm">Gratuit</span>
                                    @endif
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($programme->short_description, 80) }}</p>
                                
                                <div class="flex items-center justify-between mb-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $programme->difficulty_label }}
                                    </span>
                                    <span class="text-xs text-gray-500">{{ $programme->estimated_hours }}h</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $programme->enrolled_count }} inscrits</span>
                                    
                                    @if($programme->isEnrolledByUser(auth()->id()))
                                        <a href="{{ route('learnycool.programme.show', $programme) }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Inscrit ✓
                                        </a>
                                    @else
                                        <form action="{{ route('learnycool.programme.enroll', $programme) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1 rounded transition-colors">
                                                S'inscrire
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $availableProgrammes->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun programme trouvé</h3>
                    <p class="text-gray-600">Essayez de modifier vos critères de recherche.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('error') }}
    </div>
@endif
@endsection