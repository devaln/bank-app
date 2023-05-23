<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $addresses = Address::all();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $address = new Address();
        $title = "Address Create";
        $action = URL::route('addresses.store');
        return view('addresses.edit', compact('title', 'action', 'address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'addressable' => 'required',
            'address_text' => 'nullable|min:5',
            'district' => 'nullable|min:3',
            'state' => 'nullable|min:3',
            'zip_code' => 'nullable|min:6|integer',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        Address::create($request->all());
        return back()->with('success', 'Successfully Created Address');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
        $title = "Address Edit";
        $action = URL::route('addresses.update', $address->id);
        return view('addresses.edit', compact('title', 'action', 'address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
        $validator = Validator::make($request->all(), [
            'addressable' => 'required',
            'address_text' => 'nullable|min:5',
            'district' => 'nullable|min:3',
            'state' => 'nullable|min:3',
            'zip_code' => 'nullable|min:6|integer',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $address->update($request->all());
        return back()->with('success', 'Successfully Updated Address');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
        $address->delete();
        return back()->with('success', 'Successfully Deleted Address');
    }
}
