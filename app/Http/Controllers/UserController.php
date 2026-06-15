<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        $rentLogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('client', ['rentLogs' => $rentLogs]);
    }
}
