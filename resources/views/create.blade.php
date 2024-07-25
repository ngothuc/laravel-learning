@extends('layouts.app')

@section('title', "Tạo công việc")

@section('content')
<form method="POST" action="{{route("task.store")}}">
    @csrf
    <div>
        <label for="title">Tiêu đề</label>
        <input type="text" id="title" name="title">
        <p>{{$errors->first('title')}}</p>
    </div>
    <div>
        <label for="description">Mô tả</label>
        <textarea id="description" name="description"></textarea>
        <p>{{$errors->first('description')}}</p>
    </div>
    <div>
        <a href="{{route('tasks.index')}}">Trở về</a>
        <button type="submit">Tạo công việc</button>
    </div>
</form>
<!-- @include('layouts.form-error') -->
@endsection