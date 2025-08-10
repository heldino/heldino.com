<?php

use App\Http\Controllers\LearnerDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Homepage Portfolio Heldino
Route::get('/', function () {
    return view('portfolio');
});

// Routes d'authentification basiques (sans Laravel UI)
Route::get('/login', function () {
    return redirect('/learnycool');
})->name('login');

// Route de test pour se connecter rapidement
Route::get('/test-login', function () {
    $user = \App\Models\User::first();
    if ($user) {
        Auth::login($user);
        return redirect()->route('learnycool.dashboard');
    }
    return redirect('/');
});

Route::get('/register', function () {
    return redirect('/learnycool');
})->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// LMS Routes avec préfixe learnycool
Route::prefix('learnycool')->group(function () {
    // LMS Homepage - utilise une vue simple au lieu de Filament
    Route::get('/', function () {
        return view('lms-homepage');
    });
    
    // Routes LMS publiques
    Route::get('/formations', function () {
        return view('formations', [
            'formations' => collect([])
        ]);
    });
    
    Route::get('/formation/{slug}', function ($slug) {
        return view('formation', [
            'formation' => (object) ['name' => 'Formation Example', 'slug' => $slug]
        ]);
    });
    
    // Dashboard Apprenant (nécessite authentification)
    Route::middleware(['auth'])->prefix('app')->name('learnycool.')->group(function () {
        Route::get('/learner-dashboard', [LearnerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/programme/{programme}', [LearnerDashboardController::class, 'show'])->name('programme.show');
        Route::post('/programme/{programme}/enroll', [LearnerDashboardController::class, 'enroll'])->name('programme.enroll');
    });
});
