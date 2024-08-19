<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Use App\Livewire\Students\Students;
use App\Livewire\Filiere\FiliereComponent;
use App\Livewire\Absence\AbesenceCompenent;
use App\Livewire\SeanceCours\SeanceCoursComponent;



Route::get('/', function () { return view('auth.login');});



//Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', Students::class)->name('dashboard');
    Route::get('/ist-mange-filiere', FiliereComponent::class)->name('filiere.index');
    Route::get('/absence', AbesenceCompenent::class)->name('absence.index');
    Route::get('/seance-cours', SeanceCoursComponent::class)->name('seance-cours.index');
    
   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
