<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Card;
use App\Models\Particular;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $particulars = Particular::all();
        return view('particulars.index', compact('particulars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $particular = new Particular();
        $title = "Particular Create";
        $action = URL::route('particulars.store');
        $users = User::all();
        return view('particulars.edit', compact('action', 'particular', 'title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'ammount' => 'required',
            // 'sender_id' => 'required',
            'receiver_id' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $user = User::find(Auth::user()->id);
        $acc_id = ($user->accountable_type === Accounts::class)? $user->accountable->id : $user->accountable->account->id;
        $card_id = Card::where('account_id', $acc_id)->first();

        $particular = new Particular();
        $particular['card_id'] = $card_id->id;
        $particular['ammount'] = $request->ammount;
        $particular['sender_id'] = $user->id;
        $particular['receiver_id'] = $request->receiver_id;
        $particular['description'] = $request->description ?? null;

        if ($particular->save()) {
            $this->receiver_balance($request);
            $this->sender_balance($request);

            return redirect()->route('particulars.index')->with('success', 'Successfully Created Particular');
        }

        return back()->with('danger', 'SomeThings Goes Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Particular $particular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Particular $particular)
    {
        //
        $title = "Particular Edit";
        $action = URL::route('particulars.update', $particular->id);
        $users = User::all();
        return view('particulars.edit', compact('action', 'particular', 'title', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Particular $particular)
    {
        //
        $validator = Validator::make($request->all(), [
            'ammount' => 'required',
            // 'sender_id' => 'required',
            'receiver_id' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('danger', $validator->errors());
        }

        $user = User::find(Auth::user()->id);
        $acc_id = ($user->accountable_type === Accounts::class)? $user->accountable->id : $user->accountable->account->id;
        $card_id = Card::where('account_id', $acc_id)->first();

        $particular['card_id'] = $card_id->id;
        $particular['ammount'] = $request->ammount;
        $particular['sender_id'] = $user->id;
        $particular['receiver_id'] = $request->receiver_id;
        $particular['description'] = $request->description ?? null;


        if ($particular->update($request->all())) {
            $this->receiver_balance($request);
            $this->sender_balance($request);

            return redirect()->route('particulars.index')->with('success', 'Successfully Updated Particular');
        }

        return back()->with('danger', 'Somethings truns wrongs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Particular $particular)
    {
        //
        $particular->delete();
        return back()->with('success', 'Successfully Deleted Particular');
    }
    /*
         Receiver Current Balance
    */
    public function receiver_balance($request)
    {
        $receiver = User::where('id', $request->receiver_id)->first();

        if (is_null($receiver->accountable)) {
            $receiver->accountable->account->current_balance = $receiver->accountable->account->current_balance + $request->ammount;
            $receiver->accountable->account->current_balance->save([$receiver->accountable->account->current_balance + $request->ammount]);
        }
        else {
            $receiver->accountable->current_balance = $receiver->accountable->current_balance + $request->ammount;
            $receiver->accountable->save([$receiver->accountable->current_balance + $request->ammount]);
        }
    }
    /*
        Sender Current Balance
    */
    public function sender_balance($request)
    {
        $sender = User::where('id', Auth::user()->id)->first();
        // dd($sender->accountable);
        if (is_null($sender->accountable->current_balance)) {
            $sender->accountable->account->current_balance = $sender->accountable->account->current_balance - $request->ammount;
            $sender->accountable->account->save([$sender->accountable->account->current_balance - $request->ammount]);
        }
        else {
            $sender->accountable->current_balance = $sender->accountable->current_balance - $request->ammount;
            $sender->accountable->save([$sender->accountable->current_balance - $request->ammount]);
        }
    }
}
