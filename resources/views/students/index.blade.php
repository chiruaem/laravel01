@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Students</h1>
    <a href="/students/create">Create new</a>
    <form class="form-inline" action="/students/search" method="GET">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="" class="sr-only">Put name here</label>
            <input type="text" class="form-control" name="name" placeholder="Put name here">
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>
    </form>
    </form>
    <table width="100%" class="table table-striped">
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>gender</td>
                <td>toan</td>
                <td>ly</td>
                <td>hoa</td>
                <td>anh</td>
                <td>group</td>
                <td>created date</td>
                <td>updated date</td>
                <td>#</td>
            </tr>
        </thead>
        @foreach($students as $student)
        <tbody>
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->gender}}</td>
                {{--  <td>{{$student->results[0]->toan}}</td>
                <td>{{$student->results[0]->ly}}</td>
                <td>{{$student->results[0]->hoa}}</td>
                <td>{{$student->results[0]->anh}}</td>  --}}
                @foreach($student->results as $item)
                <td>{{$item->toan}}</td>
                <td>{{$item->ly}}</td>
                <td>{{$item->hoa}}</td>
                <td>{{$item->anh}}</td>
                @endforeach
                <td>{{$student->groups->name}}</td>
                <td>{{$student->created_at}}</td>
                <td>{{$student->updated_at}}</td>
                <td>
                <form action="/students/{{$student->id}}/edit" style="float:left">
                    <input class="btn btn-primary" type="submit" value="EDIT">
                </form>
                    <form action="/students/{{$student->id}}" method="POST" style="float:left;margin-left:10px;">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method">
                        <input class="btn btn-primary" type="submit" name="delete" value="DELETE">
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection