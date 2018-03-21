@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Create new Students</h1>
    <form action="/students" method="POST">
        @csrf {{-- <input type="hidden" name="_method" value="POST"> --}}
        <div class="col-md-6 form-group">
            <label for="">Name</label>
            <input class="form-control" autofocus="" type="text" name="name">
        </div>
        <div class="col-md-6 form-group">
                <label for="">Age</label>
                <input class="form-control" type="text" name="age">
            </div>
            <div class="col-md-6 form-group">
                <label for="">Gender</label>
                <input class="form-control" type="text" name="gender">
            </div>
        <div class="col-md-6 form-group">
            <label for="">Toan</label>
            <input class="form-control" type="text" name="toan">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Ly</label>
            <input class="form-control"type="text" name="ly">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Hoa</label>
            <input class="form-control" type="text" name="hoa">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Anh</label>
            <input class="form-control" type="text" name="anh">
        </div>
        <div class="col-md-6 form-group">
        <select class="col-md-6 form-control" name="group">
            @foreach($groups as $group)
        <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
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