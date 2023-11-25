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
Route::get('/events/{id}-{name}', [EventController::class, 'event_detail'])->name('events.show');
Route::get('/search_categories', [EventController::class, 'search_categories'])->name('events.search_categories');
Route::get('/create_request', [EventController::class, 'create_request'])->name('events.create_request');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::get('/place/{id}-{name}', [EventController::class, 'place_detail'])->name('events.places');
Route::get('/search_categories/{id}-{name}', [EventController::class, 'category_page'])->name('events.category_page');



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

