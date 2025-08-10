<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Mes Formations
        </x-slot>
        
        <div class="space-y-4">
            @forelse($formations as $formation)
                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $formation->name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $formation->description }}</p>
                            
                            <div class="flex items-center mt-3 space-x-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    {{ $formation->completed_modules }}/{{ $formation->modules_count }} modules
                                </div>
                                
                                @if($formation->status === 'en_cours')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        En cours
                                    </span>
                                @elseif($formation->status === 'termine')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Terminé
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Non commencé
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Barre de progression -->
                            <div class="mt-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Progression</span>
                                    <span class="font-medium">{{ $formation->progress }}%</span>
                                </div>
                                <div class="mt-1 bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" 
                                         style="width: {{ $formation->progress }}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="ml-4">
                            @if($formation->status === 'en_cours')
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                                    Continuer
                                </button>
                            @elseif($formation->status === 'termine')
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 transition-colors">
                                    Revoir
                                </button>
                            @else
                                <button class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition-colors">
                                    Commencer
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <p class="text-lg font-medium">Aucune formation disponible</p>
                    <p class="text-sm mt-1">Inscrivez-vous à votre première formation pour commencer votre apprentissage</p>
                </div>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>