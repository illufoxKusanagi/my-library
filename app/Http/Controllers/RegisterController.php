<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', ["title" => 'register']);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'email' => 'unique:users| max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ], [
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.'
        ]);

        if ($validated) {
            $validated['password'] = bcrypt($validated['password']);
            $user = User::create($request->all());

            Alert::success('Success', 'Congratulations, your account has been created');
            return redirect('login');
        }
    }
}
