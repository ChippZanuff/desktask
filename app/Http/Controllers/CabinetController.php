<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class CabinetController extends Controller
{
    public function index()
    {
        return view('cabinet.cabinet');
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($request->user()->id);

        if(Hash::check($request->input('old_password'), $user->password)){
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
        }

        return redirect('/cabinet');
    }

    public function resetEmail(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::find($request->user()->id);

        if(Hash::check($request->input('password'), $user->password)){
            $user->email = $request->input('new_email');
            $user->save();
        }

        return redirect('/cabinet');
    }
}
