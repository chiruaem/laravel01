<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\Result;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::get();
        return view('/groups.index', ['groups'=>$groups]);
    }
    public function search()
    {
        $name = request()->input('name');
        $groups = Group::where([
            ['name', 'LIKE', '%'. $name .'%'],
        ])->get();
        return view('/groups.index', ['groups'=>$groups]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get();
        return view('/groups.create', ['groups'=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = request()->input('name');

        $group = New Group();

        $group->name = $name;

        $group->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::with('students')->find($id);
        return view('/groups.show', ['groups'=>$groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::find($id);
        return view('/groups.edit', ['groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $groups = Group::get();

        $name = request()->input('name');

        $group->name = $name;

        $group->update();

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Group::find($id);
        $groups->delete();
        return redirect('/groups');
    }
}
