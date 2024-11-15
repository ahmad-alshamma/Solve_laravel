<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
// Route::get('/notes/{note}',[NoteController::class, 'show'])->name('notes.show');
Route::get('notes/create',[NoteController::class,'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}/edit', [NoteController::class,'edit'])->name('notes.edit');
Route::put('/notes/{note}',[NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}',[NoteController::class, 'destroy'])->name('notes.destroy');
