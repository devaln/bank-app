<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "User Create";
        $user = new User();
        $action = URL::route('users.store');
        return view('users.edit', compact('action', 'user', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'accountable' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed',
            'first_name' => 'nullable|min:3',
            'middle_name' => 'nullable|min:3',
            'last_name' => 'nullable|min:3',
            'phone' => 'nullable|unique:users,phone|min:10|max:10',
            'date_of_birth' => 'nullable|before:' . Carbon::yesterday(),
            'gender' => 'nullable',
            'pan_card_number' => 'nullable|min:10|max:10',
            'adhaar_card_number' => 'nullable|max:12|min:12',
            'maritial_status' => 'nullable',
            'is_admin' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        if ($request->has('avatar')) {
            $imageName = '/images/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'), $imageName);
        }

        $data = [];
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['accountable_id'] = ($request->accountable == false)? Accounts::factory()->create()->id : Null;
        $data['accountable_type'] = ($request->accountable == true)? Employee::class : Accounts::class ?? Null;
        $data['avatar'] = ($request->filled('avatar'))? $imageName : '';
        $data['first_name'] = $request->first_name ?? Null;
        $data['middle_name'] = $request->middle_name ?? Null;
        $data['last_name'] = $request->last_name ?? Null;
        $data['phone'] = $request->phone ?? Null;
        $data['date_of_birth'] = $request->date_of_birth ?? Null;
        $data['gender'] = $request->gender ?? Null;
        $data['pan_card_number'] = $request->pan_card_number ?? Null;
        $data['adhaar_card_number'] = $request->adhaar_card_number ?? Null;
        $data['maritial_status'] = $request->maritial_status ?? Null;
        $data['is_admin'] = $request->is_admin;
        User::create($data);
        dd(User::create($data));

        if (User::create($data)) {
            Accounts::factory()->create();
        }

        return redirect()->route('users.index')->with('success', 'Successfully Created User');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $title = "User Edit";
        $action = URL::route('users.update', $user->id);
        return view('users.edit', compact('action', 'user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = Validator::make($request->all(), [
            'accountable_id' => 'nullable',
            'accountable_type' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'first_name' => 'nullable|min:3',
            'middle_name' => 'nullable|min:3',
            'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:10',
            'date_of_birth' => 'nullable|before:'.Carbon::yesterday(),
            'gender' => 'nullable',
            'pan_card_number' => 'nullable|min:10|max:10',
            'adhaar_card_number' => 'nullable|max:12|min:12',
            'maritial_status' => 'nullable',
            'is_admin' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }
        // dd($request->accountable);
        if ($request->filled('avatar')) {
            $imageName = '/images/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'), $imageName);
        }

        $data = [];
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        // $data['accountable_id'] = ($request->accountable == false)? Accounts::factory()->create()->id : Null;
        // $data['accountable_type'] = ($request->accountable == null)? 'App\Models\Accounts' : 'App\Models\Employee' ?? Null;
        $data['avatar'] = ($request->filled('avatar'))? $imageName : null;
        $data['first_name'] = $request->first_name ?? Null;
        $data['middle_name'] = $request->middle_name ?? Null;
        $data['last_name'] = $request->last_name ?? Null;
        $data['phone'] = $request->phone ?? Null;
        $data['date_of_birth'] = $request->date_of_birth ?? Null;
        $data['gender'] = $request->gender ?? Null;
        $data['pan_card_number'] = $request->pan_card_number ?? Null;
        $data['adhaar_card_number'] = $request->adhaar_card_number ?? Null;
        $data['maritial_status'] = $request->maritial_status ?? Null;
        $data['is_admin'] = ($request->is_admin == Null)? '0' : '1';

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Successfully Updated User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Successfully Deleted User');
    }
}
