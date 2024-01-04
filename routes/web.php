<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'medicos' => Medico::all(),
        'users' => User::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User

    Route::get('/users-index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/edit-update/{id}', [UserController::class, 'update'])->name('user.update');

    // Clientes
    Route::resources([
        'medico' => MedicoController:: class
    ]);

    // Médicos
    Route::get('/meus_medicos/{id}', [MedicoController::class, 'meus_medicos'])->name('meus.medicos');
    Route::get('/todos_medicos/', [MedicoController::class, 'todos_medicos'])->name('todos.medicos');
    Route::get('/confirma_delete/{id}', [MedicoController::class, 'confirma_delete'])->name('confirma.delete');



    // Especialidade
    Route::resources([
        'especialidade' => EspecialidadeController::class
    ]);

    Route::get('/cad_especialidade/', [EspecialidadeController::class, 'todos_medicos'])->name('cad.especialidade');

});



require __DIR__.'/auth.php';
