<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class HomeComposer

{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)  
    {
        //dd($dossierValider->notification);
        $view->with([
            
        ]);
    }
}