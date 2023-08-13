<div class="p-2 bg-white shadow-sm">
    <form action="" method="post" wire:submit.prevent="ajouterUser()">
       @csrf
       @method('post')
       @if(Session::get('error'))
           <div class="p-2">
               <div class="border-red-500 p-2 bg-red-100 animate-bounce">{{ Session::get('error') }}</div>
           </div>
       @endif
       <div class="p-2">
            <label for="">{{ __('Nom') }}</label> <br>
            <input wire:model="name" type="text" class="block mt-1 
                            @error('name') border-red-600 bg-red-100 animate-bounce @enderror 
                            rounded-md w-full border-gray-300">
            @error('name')
                <div class="">* Le champ nom est requis </div>
            @enderror
        </div>
        <div class="p-2">
            <label for="">{{ __('Email') }}</label> <br>
            <input wire:model="email" type="text" class="block mt-1 
                             @error('email') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('email')
                <div class="">* Le champ email est requis </div>
            @enderror
        </div>
        <div class="p-2">
            <label for="">{{ __("Choix du rôle de l'utilisateur") }}</label> <br>
            <select wire:model="role" class="block mt-1 
                @error('role') border-red-600 bg-red-100 animate-bounce @enderror 
                rounded-md w-full border-gray-300">
                <option value="USR">Utilisateur</option>
                <option value="GET">Gestionnaire</option>
                <option value="ADM">Administrateur</option>
            </select>
            @error('role')
                <div class="">* Le champ rôle est requis </div>
            @enderror
        </div>
        <div class="p-2">
            <label for="">{{ __("Mot de passe") }}</label> <br>
            <input wire:model="password" type="text" class="block mt-1 
                             @error('password') border-red-600 bg-red-100 animate-bounce @enderror 
                             rounded-md w-full border-gray-300">
            @error('password')
                <div class="">* Le champ mot de passe est requis </div>
            @enderror
        </div>
       <div class="p-2 flex justify-between items-center">
           <button class="bg-red-600 px-3 py-3 rounded-sm text-white">retour</button>
           <button type="submit" class="bg-blue-400 p-3 rounded-sm text-white">{{ __("Créer le compte maintenant") }}</button>
       </div>
    </form>
</div>