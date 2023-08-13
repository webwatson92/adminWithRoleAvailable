<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('name', Auth::user()->name)->first();
       
        return view('front.profil', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = User::findOrFail($id)->first();

        return view('front.edit');
    }

    
    public function editpassword(){
        $user =  User::where('password', Auth::user()->password)->first();
        return view('front.change-password', compact("user"));
    }

    public function changedpassword(ChangePasswordRequest $request){
        $user =  User::where('password', Auth::user()->password)->first();
        $lastPassword = $user->password;
        $currentPassword = Hash::make($request->current_password);
        $newPassord = $request->password;
        $confirm_password = $request->password_confirmation;
      
        if(Hash::check($request->current_password, $lastPassword))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('password_succes', 'Mot de passe a été changé avec succès!');
            return redirect()->back();
        }else{
            session()->flash('password_error', 'Combinaison incorrect!');
            return redirect()->back();
        }
        
    }
}
