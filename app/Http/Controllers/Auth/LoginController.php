<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $title = "LoginPage";
        return view('auth.register', compact('title'));
    }

    // Login Page
    public function login(Request $request)
    {
        if (auth()->user()) {
            // return redirect(route('user.dashboard'));
            return view('dashboard');
        }
        return view('auth.login');
    }
    // Register
    public function register(Request $request)
    {
        if (auth()->user()) {
            return redirect(route('user.dashboard'));
        }
        $title = 'Register';
        return view('auth.register', compact('title'));
    }

    // Login check

    public function loginCheck(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)->withInput();
            }
        }
        $credentials = [
            'email'     => $request['email'],
            'password'  => $request['password']
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged In Successfully');
        } else {
            return back()->withErrors(["error" => "Invalid User & Password, Please try again!"])->withInput();
        }
    }

    // Save Partner
    public function saveUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        //dd($validator->fails());
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect()->route('user.register')
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        DB::beginTransaction();
        $user   = new User();
        $user->email           = $request->email;
        $user->password        = Hash::make($request->password);
        $user->created_at      = date('Y-m-d H:i:s');
        $user->updated_at      = date('Y-m-d H:i:s');
        $user->save();
        DB::commit();
        return redirect()->route('admin.dashboard')->with('success', 'Registred successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
