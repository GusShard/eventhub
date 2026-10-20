<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Redirecionamento da raiz
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('events.index')
        : redirect()->route('login');
});

// Rotas para visitantes (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Logout (exige estar autenticado)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Rotas protegidas por Autenticação (Usuário Comum e Admin)
Route::middleware('auth')->group(function () {
    
    // Eventos (Apenas visualização e detalhes)
    Route::resource('eventos', EventController::class)
        ->only(['index', 'show'])
        ->parameters(['eventos' => 'event'])
        ->names('events');

    // Inscrições do Usuário
    Route::post('/eventos/{event}/inscricoes', [RegistrationController::class, 'store'])
        ->name('registrations.store');

    Route::get('/minhas-inscricoes', [RegistrationController::class, 'index'])
        ->name('registrations.index');

    Route::delete('/inscricoes/{registration}', [RegistrationController::class, 'destroy'])
        ->name('registrations.destroy');

    // Rotas Administrativas (Exigem perfil de Admin)
    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            
            // CRUD de Categorias
            Route::resource('categories', AdminCategoryController::class);

            // Participantes do Evento
            Route::get('/events/{event}/participants', [AdminEventController::class, 'participants'])
                ->name('events.participants');

            // CRUD de Eventos no Admin
            Route::resource('events', AdminEventController::class)
                ->except(['show']);
        });
});