@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Editing Student</h1>
    <form action="/students/{{$students->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-6 form-group">
            <label for="">Name</label>
        <input class="form-control" autofocus="" type="text" name="name" value="{{$students->name}}">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Age</label>
            <input class="form-control" autofocus="" type="text" name="age" value="{{$students->age}}">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Toan</label>
            <input class="form-control" autofocus="" type="text" name="toan" value="{{$students->results[0]->toan}}">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Ly</label>
            <input class="form-control" autofocus="" type="text" name="ly" value="{{$students->results[0]->ly}}">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Hoa</label>
            <input class="form-control" autofocus="" type="text" name="hoa" value="{{$students->results[0]->hoa}}">
        </div>
        <div class="col-md-6 form-group">
            <label for="">Anh</label>
            <input class="form-control" autofocus="" type="text" name="anh" value="{{$students->results[0]->anh}}">
        </div>
        <div class="col-md-6 form-group">
            <select class="col-md-6 form-control" name="group" value="">
            @foreach($groups as $group)
        <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-md-6 form-group">
            <input class="btn btn-primary" type="submit" name="create" value="create">
        </div>
        {{-- bắt lỗi --}} @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif {{-- bắt lỗi --}}
    </form>
</div>
@endsection