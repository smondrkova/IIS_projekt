<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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
Route::get('/events/{id}-{name}', [EventController::class, 'show'])->name('events.show');
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::get('/create_request', [EventController::class, 'create_request'])->name('events.create_request');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');

Route::get('/create_event', [EventController::class, 'create_event'])->name('events.create_event');
Route::post('/create_event', [EventController::class, 'store_event'])->name('events.store_event');

Route::get('/create_category', [EventController::class, 'create_category'])->name('events.create_category');
Route::post('/create_category', [EventController::class, 'store_category'])->name('events.store_category');

Route::get('/create_place', [EventController::class, 'create_place'])->name('events.create_place');
Route::post('/create_place', [EventController::class, 'store_place'])->name('events.store_place');


// Route::view('/tasks/create', 'create')->name('tasks.create');

// Route::get('/tasks/{task}/edit', function(Task $task){
//     return view('edit', ['task'=>$task]);
// })->name('tasks.edit');

// Route::get('/tasks/{task}', function(Task $task){
//     return view('show', ['task'=>$task]);
// })->name('tasks.show');

// Route::post('/tasks', function(TaskRequest $request){
//     $task = Task::create($request->validated());
//     return redirect()->route('tasks.show', ['task'=>$task->id])
//         ->with('success', 'Task created successfully!');
// })->name('tasks.store');

// Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
//     $task->update($request->validated());
//     return redirect()->route('tasks.show', ['task'=>$task->id])
//         ->with('success', 'Task updated successfully!');
// })->name('tasks.update');

// Route::delete('/tasks/{task}', function(Task $task){
//    $task->delete();
//    return redirect()->route('tasks.index')->with(
//        'success', 'Task deleted successfully!'
//    );
// })->name('tasks.destroy');

// Route::put('tasks/{task}/toggle-complete', function(Task $task){
//     $task->toggleComplete();

//    return redirect()->back()->with('success', 'Task updated successfully');
// })->name('tasks.toggle-complete');

// Route::fallback(function(){
//     return 'Still got somewhere!';
// });

