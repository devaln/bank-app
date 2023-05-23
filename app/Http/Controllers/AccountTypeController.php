<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $account_types = AccountType::all();
        return view('account_type.index', compact('account_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $accountType = new AccountType();
        $action = URL::route('account-type.store');
        return view('account_type.edit', compact('accountType', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'loan_intrest_rate' => 'required',
            'saving_intrest_rate' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }
        
        AccountType::create($request->all());
        return redirect()->route('account-type.index')->with('success', 'Succesfully Added Type');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountType $accountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountType $accountType)
    {
        //
        $action = URL::route('account-type.update', $accountType->id);
        return view('account_type.edit', compact('accountType', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountType $accountType)
    {
        //
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'loan_intrest_rate' => 'required',
            'saving_intrest_rate' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $accountType->update($request->all());
        return redirect()->route('account-type.index')->with('success', 'Succesfully Updated Type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountType $accountType)
    {
        //
        $accountType->delete();
        return redirect()->route('account-type.index')->with('success', 'Account Type Deleted Successfully');
    }
}
