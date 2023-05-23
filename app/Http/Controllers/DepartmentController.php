<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $department = new Department();
        $action = URL::route('departments.store');
        return view('departments.edit', compact('department', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name,except,id',
            'employee_count' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return back()->with('danger', $validator->errors()->all());
        }
        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        $action = URL::route('departments.update', $department->id);
        return view('departments.edit', compact('department', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'employee_count' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department Deleted Successfully');
    }
}
