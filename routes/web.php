<?php

use Illuminate\Support\Facades\Route;

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
Route::put('/approve_event/{id}', [UserController::class, 'approveEvent'])->name('approve_event');
Route::put('/approve_place/{id}', [UserController::class, 'approvePlace'])->name('approve_place');
Route::put('/approve_category/{id}', [UserController::class, 'approveCategory'])->name('approve_category');

Route::delete('/delete_event/{id}', [UserController::class, 'deleteEventRequest'])->name('delete_event');
Route::delete('/delete_event_from_catalog/{id}', [UserController::class, 'deleteEvent'])->name('delete_event_from_catalog');
Route::delete('/delete_category/{id}', [UserController::class, 'deleteCategory'])->name('delete_category');
Route::delete('/delete_category_from_catalog/{id}', [UserController::class, 'deleteCategoryFromCatalog'])->name('delete_category_from_catalog');
Route::delete('/delete_place/{id}', [UserController::class, 'deletePlace'])->name('delete_place');
Route::delete('/delete_place_from_catalog/{id}', [UserController::class, 'deletePlaceFromCatalog'])->name('delete_place_from_catalog');
Route::delete('/delete_user/{id}', [UserController::class, 'deleteUser'])->name('delete_user');

Route::get('/manage_categories', [UserController::class, 'manageCategories'])->name('manage_categories');
Route::get('/manage_places', [UserController::class, 'managePlaces'])->name('manage_places');
Route::get('/manage_users', [UserController::class, 'manageUsers'])->name('manage_users');

Route::get('/place/{id}-{name}', [EventController::class, 'place_detail'])->name('events.places');
Route::get('/search_categories/{id}-{name}', [EventController::class, 'category_page'])->name('events.category_page');

Route::get('/create_event', [EventController::class, 'create_event'])->name('events.create_event');
Route::post('/create_event', [EventController::class, 'store_event'])->name('events.store_event');

Route::get('/create_category', [EventController::class, 'create_category'])->name('events.create_category');
Route::post('/create_category', [EventController::class, 'store_category'])->name('events.store_category');

Route::get('/create_place', [EventController::class, 'create_place'])->name('events.create_place');
Route::post('/create_place', [EventController::class, 'store_place'])->name('events.store_place');

Route::get('/edit_event/{id}-{name}', [EventController::class, 'edit_event'])->name('events.edit_event');
Route::patch('/edit_event/{id}-{name}', [EventController::class, 'update_event'])->name('events.update_event');

