<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function showAdminLogin()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Vérifier si le mot est correcte
            if (Hash::check($request->password, $user->password)) {
                // Loguer la personne
                Auth::login($user);
                // redirect vers son dashbaord
                return redirect()->route('admin.dashboard');
            } else {
                // flashy utilisateur non existant / Mot de passe et email invalides
                return back();
            }
        } else {
            // flashy utilisateur non existant / Mot de passe et email invalides
            return back();
        }
    }

    public function changePassword($id)
    {
        $user = User::find(decrypt($id));
        if ($user) {
            if ($user->password === "1111") {
                return view('new-password', compact('user'));
            } else {
                return "Mot de passe déja modifié";
            }
        } else {
            return abort(404);
        }
    }

    public function storePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.dashboard');

        // return "Mot de passe modifié";
        // Redirigé vers profil ou son dashboard
    }
}
