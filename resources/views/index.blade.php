@extends('layouts.app')

@section('title', 'Danh sách công việc')

@section('content')
@foreach ($tasks as $task)
<div>
    <a href="{{route('task.show', ['task' => $task])}}">
        {{$task->title}}
    </a>
</div>
@endforeach
<a href="{{route('task.create')}}">Thêm công việc</a>
@endsection