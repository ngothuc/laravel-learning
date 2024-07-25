@extends('layouts.app')

@section('title', "Sửa công việc")

@section('content')
<form method="POST" action="{{route("task.update", ['task' => $task])}}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" id="title" name="title" value="{{$task->title}}">
        <p>{{$errors->first('title')}}</p>
    </div>
    <div>
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" value="{{$task->description}}"></textarea>
        <p>{{$errors->first('description')}}</p>
    </div>
    <div>
        <a href="{{route('task.show', ['task' => $task])}}">Trở về</a>
        <button type="submit">Sửa công việc</button>
    </div>
</form>
@endsection