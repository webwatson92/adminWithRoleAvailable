<?php

namespace App\Http\Livewire\Front\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class ListeComponent extends Component
{
    use WithPagination;

    public $search= "";

    public function supprimerUser(User $user){
        $user->delete();
        Alert::toast("Suppression du compte de l'utilisateur effectué avec succès.", 'success');
        return redirect()->route('user');
    }
    
    public function render()
    {
        if(!empty($this->search)){
            $listeUsers =  User::where('name', 'LIKE', '%'. $this->search.'%')
                            ->orWhere('email', 'LIKE', '%'. $this->search.'%')
                            ->paginate(10);
            return view('livewire.front.users.liste-component', compact('listeUsers'));
        }else{
            $listeUsers =  User::latest()->paginate(10); 
            return view('livewire.front.users.liste-component', compact('listeUsers'));
        } 

        $listeUsers =  User::latest()->paginate(10);

        return view('livewire.front.users.liste-component', compact('listeUsers'));
    }
}
