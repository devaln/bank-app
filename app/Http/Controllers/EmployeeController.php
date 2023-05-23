<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Card;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employee = new Employee();
        $title = "Create Employee ";
        $action = URL::route('employees.store');
        $departments = Department::all();
        $accounts = Accounts::all();
        return view('employees.edit', compact('employee', 'title', 'action', 'departments', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'department_id'     => 'required|exists:departments,id',
            'account_id'        => 'nullable|exists:accounts,id',
            'education'         => 'nullable',
            'date_of_joining'   => 'required|before:'.Carbon::yesterday(),
            'designation'       => 'nullable',
            'official_email'    => 'required|unique:employees,official_email|email',
            'salary_ammount'    => 'nullable',
            'work_status'       => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $employee = new Employee();
        $employee['department_id']   = $request->department_id;
        $employee['account_id']      = Accounts::factory()->create()->id;
        $employee['education']       = $request->education;
        $employee['date_of_joining'] = $request->date_of_joining;
        $employee['designation']     = $request->designation;
        $employee['official_email']  = $request->official_email;
        $employee['salary_ammount']  = $request->salary_ammount;
        $employee['work_status']     = '1';

        if ($employee->save()) {
            return redirect()->route('employees.index')->with('success', 'successfully Created Employee');
        }

        return back()->with('error', 'Somethings goes wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        $title = "Create Employee ";
        $action = URL::route('employees.update', $employee->id);
        $name = Department::where('id', $employee->department_id)->first()->name;
        $departments = Department::all();
        $accounts = Accounts::all();
        return view('employees.edit', compact('employee', 'title', 'action', 'departments', 'accounts', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $validator = Validator::make($request->all(), [
            'department_id'     => 'required',
            'account_id'        => 'nullable',
            'education'         => 'nullable',
            'date_of_joining'   => 'required|before:'.Carbon::yesterday(),
            'designation'       => 'nullable',
            'official_email'    => 'required|email',
            'salary_ammount'    => 'nullable',
            'work_status'       => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }
        $data = [];
        $data['department_id']   = $request->department_id;
        $data['account_id']      = $employee->account_id;
        $data['education']       = $request->education;
        $data['date_of_joining'] = $request->date_of_joining;
        $data['designation']     = $request->designation;
        $data['official_email']  = $request->official_email;
        $data['salary_ammount']  = $request->salary_ammount;
        $data['work_status']     = $request->work_status;
        $employee->fill($data);

        if ($employee->save()) {
            return redirect()->route('employees.index')->with('success', 'successfully Updated Employee');
        }

        return back()->with('danger', 'Somethings goes wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'successfully Deleted Employee');
    }
}
