<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createUserView()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->role;
        $user->password = "1111";
        $user->save();

        Mail::to($user)->send(new ConfirmAccountMail($user));
        // flashy compte crée avec succès

        return redirect()->route('admin.dashboard');
    }
}
