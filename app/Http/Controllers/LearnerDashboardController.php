<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\ProgrammeEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Récupérer les programmes auxquels l'utilisateur est inscrit
        $enrolledProgrammes = ProgrammeEnrollment::with('programme')
            ->where('user_id', $user->id)
            ->latest('last_accessed_at')
            ->get();

        // Récupérer tous les programmes publiés avec filtres possibles
        $query = Programme::published()->with('creator');
        
        // Filtres
        if ($request->has('category') && $request->category) {
            $query->byCategory($request->category);
        }
        
        if ($request->has('difficulty') && $request->difficulty) {
            $query->byDifficulty($request->difficulty);
        }
        
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%');
            });
        }

        $availableProgrammes = $query->latest('created_at')->paginate(12);
        
        // Récupérer les catégories disponibles
        $categories = Programme::published()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort()
            ->values();

        // Statistiques de l'utilisateur
        $stats = [
            'total_enrolled' => $enrolledProgrammes->count(),
            'completed' => $enrolledProgrammes->where('status', 'completed')->count(),
            'in_progress' => $enrolledProgrammes->where('status', 'active')->count(),
            'total_xp' => $user->total_xp ?? 0,
        ];

        return view('learnycool.learner-dashboard', compact(
            'enrolledProgrammes', 
            'availableProgrammes', 
            'categories', 
            'stats'
        ));
    }

    public function enroll(Programme $programme)
    {
        $user = Auth::user();
        
        // Vérifier si l'utilisateur n'est pas déjà inscrit
        if ($programme->isEnrolledByUser($user->id)) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à ce programme.');
        }

        // Créer l'inscription
        ProgrammeEnrollment::create([
            'user_id' => $user->id,
            'programme_id' => $programme->id,
            'enrolled_at' => now(),
            'status' => 'active',
        ]);

        // Incrémenter le compteur d'inscriptions
        $programme->increment('enrolled_count');

        return redirect()->back()->with('success', 'Inscription réussie ! Vous pouvez maintenant commencer le programme.');
    }

    public function show(Programme $programme)
    {
        // Détails d'un programme spécifique
        $programme->load(['modules.lessons', 'creator']);
        
        $user = Auth::user();
        $enrollment = $programme->getProgressForUser($user->id);
        
        return view('learnycool.programme-detail', compact('programme', 'enrollment'));
    }
}
