@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Create new Group</h1>
    <form action="/groups" method="POST">
        @csrf {{-- <input type="hidden" name="_method" value="POST"> --}}
        <div class="col-md-6 form-group">
            <label for="">Name</label>
            <input class="form-control" autofocus="" type="text" name="name">
        </div>
        <div class="col-md-6 form-group">
            <input class="btn btn-primary" type="submit" name="create" value="create">
        </div>
        {{--  bắt lỗi --}} @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif {{-- bắt lỗi  --}}
    </form>
</div>
@endsection