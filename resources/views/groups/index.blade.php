@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>Groups</h1>
    <a href="/groups/create">Create new</a>
    <form class="form-inline" action="/groups/search" method="GET">
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
                <td>created date</td>
                <td>updated date</td>
                <td>#</td>
            </tr>
        </thead>
        @foreach($groups as $group)
        <tbody>
            <tr>
                <td>{{$group->id}}</td>
            <td><a href="/groups/{{$group->id}}/show">{{$group->name}}</a></td>
                <td>{{$group->created_at}}</td>
                <td>{{$group->updated_at}}</td>
                <td>
                <form action="/groups/{{$group->id}}/edit" style="float:left">
                    <input class="btn btn-primary" type="submit" value="EDIT">
                </form>
                    <form action="/groups/{{$group->id}}" method="POST" style="float:left;margin-left:10px;">
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