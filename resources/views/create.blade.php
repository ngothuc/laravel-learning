@extends('layouts.app')

@section('title', "Tạo công việc")

@section('content')
<form method="POST" action="{{route("task.store")}}">
    @csrf
    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="description">Mô tả</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <button type="submit">Tạo công việc</button>
    </div>
</form>
@endsection