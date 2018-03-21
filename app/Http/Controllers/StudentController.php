<?php

namespace App\Http\Controllers;

use App\Student;
use App\Group;
use App\Result;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('results')->get();
        $groups = Group::get();
        return view('/students.index', ['students'=>$students, 'groups'=>$groups]);
    }
    public function search()
    {
        $name = request()->input('name');
        $students = Student::where([
            ['name', 'LIKE', '%'. $name .'%'],
        ])->get();
        return view('/students.index', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $groups = Group::get();
        return view('/students.create', ['students'=>$students, 'groups'=>$groups]);
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
        $age = request()->input('age');
        $gender = request()->input('gender');
        $group = request()->input('group');

        $student = New Student();

        $student->name = $name;
        $student->age = $age;
        $student->gender = $gender;
        $student->group_id = $group;

        $student->save();
        $id = $student->id;

        $toan = request()->input('toan');
        $ly = request()->input('ly');
        $hoa = request()->input('hoa');
        $anh = request()->input('anh');

        $results = new Result();

        $results->toan = $toan;
        $results->ly = $ly;
        $results->hoa = $hoa;
        $results->anh = $anh;
        $results->student_id = $id;
        $results->save();
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        $groups = Group::get();
        return view('/students.edit', ['students'=>$students, 'groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $inputs = $request->all();
        $student->update($inputs);
        $student->results()->update([
            'toan' => request()->input('toan'),
            'ly' => request()->input('ly'),
            'hoa' => request()->input('hoa'),
            'anh' => request()->input('anh'),
        ]);
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect('/students');
    }
}
