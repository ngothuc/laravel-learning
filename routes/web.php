<?php

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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


Route::post('task/store', function (StoreRequest $request) {
    $data = $request;
    
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

Route::put('tasks/{task}', function (Task $task, UpdateRequest $request) {
    
    $data = $request;

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->save();

    return redirect()->route('task.show', ['task' => $task]);
})->name('task.update');

Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index');
})->name('task.delete');