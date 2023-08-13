<?php

namespace App\Http\Livewire\Front\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CreerUserComponent extends Component
{
    public $name, $email, $role, $password;
    
    public function ajouterUser(User $user){
        $this->validate([
            'name' =>"string|required",
            'email' =>"string|required|users:unique",
            'role' =>"string|required",
            'password' =>"string|required|min:8",
        ]);
        
        try{
            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->password = Hash::make($this->name);
            $user->save();
            Alert::toast("Compté crée avec succès.", 'success');
            return redirect()->route('liste.user');
        }catch(Exeception $e){
            //traitement de l'exeception
        }
    }


    public function render()
    {
        return view('livewire.front.users.creer-user-component');
    }
}
