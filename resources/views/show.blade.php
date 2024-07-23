@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div>
    <p>{{$task->description}}</p>
    <p>Ngày tạo: {{$task->created_at}}</p>
    <p>Ngày cập nhật: {{$task->updated_at}}</p>
</div>
<div>
    <a href="{{route('tasks.index')}}">Trở về</a>
    <a href="{{route('task.edit', ['task' => $task])}}"> Sửa công việc</a>
    <form action="{{route('task.delete', ['task' => $task])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Xóa công việc</button>
    </form>
</div>
@endsection