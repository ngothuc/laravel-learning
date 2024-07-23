<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::all()
    ]);
})->name('tasks.index');

Route::get('tasks/create', function () {
    return view('create');
})->name('task.create');


Route::post('task/store', function (Request $request) {
    $data = $request->validate([
        'title' =>'required|max:255',
        'description' =>'required'
    ]);
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->completed = false;
    $task->save();

    return redirect()->route('task.show', ['task' => $task]);
})->name('task.store');

Route::get('tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('task.show');

Route::get('tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::put('tasks/{task}', function (Task $task, Request $request) {
    
    $data = $request->validate([
        'title' =>'required|max:255',
        'description' =>'required'
    ]);

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->save();

    return redirect()->route('task.show', ['task' => $task]);
})->name('task.update');

Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index');
})->name('task.delete');