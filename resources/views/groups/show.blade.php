@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Students of Group <span style="color:brown;font-weight:bold">{{$groups->name}}</span></h1>
    </form>
    <table width="100%" class="table table-striped">
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>gender</td>
                <td>created date</td>
                <td>updated date</td>
            </tr>
        </thead>
        <tbody>
            @foreach($groups->students as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><a href="/students">{{$item->name}}</a></td>
                <td>{{$item->age}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection