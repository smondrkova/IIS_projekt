<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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


// Route::get('/', function(){
//     return redirect()->route('tasks.index');
// });

// Route::get('/tasks', function ()  {
//     return view('index', [
//         'events'=> Event::latest()->paginate(10)
//     ]);
// })->name('tasks.index');

Route::redirect('/', '/events');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}-{name}', [EventController::class, 'event_detail'])->name('events.show');
Route::get('/search_categories', [EventController::class, 'search_categories'])->name('events.search_categories');
Route::get('/create_request', [EventController::class, 'create_request'])->name('events.create_request');

Route::post('/events/{id}-{name}/register_event', [EventController::class, 'registerOnEvent'])->name('events.register');
Route::delete('/events/{id}-{name}/unregister', [EventController::class, 'unregisterFromEvent'])->name('events.unregister');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');

Route::get('/login', [AuthController::class, 'login_form'])->name('auth.login_form');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/register', [AuthController::class, 'register_form'])->name('auth.register_form');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/approve', [UserController::class, 'approve'])->name('approve');

Route::get('/manage_users', [UserController::class, 'manageUsers'])->name('manage_users');
Route::delete('/delete_user/{id}', [UserController::class, 'deleteUser'])->name('delete_user');

Route::get('/place/{id}-{name}', [EventController::class, 'place_detail'])->name('events.places');
Route::get('/search_categories/{id}-{name}', [EventController::class, 'category_page'])->name('events.category_page');

Route::get('/create_event', [EventController::class, 'create_event'])->name('events.create_event');
Route::post('/create_event', [EventController::class, 'store_event'])->name('events.store_event');

Route::get('/create_category', [EventController::class, 'create_category'])->name('events.create_category');
Route::post('/create_category', [EventController::class, 'store_category'])->name('events.store_category');

Route::get('/create_place', [EventController::class, 'create_place'])->name('events.create_place');
Route::post('/create_place', [EventController::class, 'store_place'])->name('events.store_place');

