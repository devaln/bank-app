<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Nominee;
use Carbon\Carbon;
use Database\Seeders\CustomerTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nominees = Nominee::all();
        return view('nominees.index', compact('nominees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nominee = new Nominee();
        $title = "Nominee Create";
        $action = URL::route('nominees.store');
        return view('nominees.edit', compact('nominee', 'title', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            // 'account_id'    =>  'required',
            'first_name'    =>  'nullable|min:3',
            'last_name'     =>  'nullable|min:3',
            'phone'         =>  'required|min:10',
            'gender'        =>  'nullable',
            'relation'      =>  'required|min:3',
            'date_of_birth' =>  'required|before:'.Carbon::yesterday(),
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $request['account_id'] = Accounts::last()->id;
        Nominee::create($request->all());
        return redirect()->route('nominees.index')->with('success', 'Nominee Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nominee $nominee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nominee $nominee)
    {
        //
        $title = "Nominee Edit";
        $action = URL::route('nominees.update', $nominee->id);
        return view('nominees.edit', compact('nominee', 'title', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nominee $nominee)
    {
        //
        $validator = Validator::make($request->all(), [
            // 'account_id'    =>  'required',
            'first_name'    =>  'nullable|min:3',
            'last_name'     =>  'nullable|min:3',
            'phone'         =>  'required|min:10',
            'gender'        =>  'nullable',
            'relation'      =>  'required|min:3',
            'date_of_birth' =>  'required|before:'.Carbon::yesterday(),
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $request['account_id'] = Accounts::latest()->first()->id;
        $nominee->update($request->all());
        return redirect()->route('nominees.index')->with('success', 'Nominee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nominee $nominee)
    {
        //
        $nominee->delete();
        return redirect()->route('nominees.index')->with('success', 'Nominee Deleted Successfully');
    }
}
