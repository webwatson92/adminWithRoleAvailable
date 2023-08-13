<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(){
        return view('front.users.creer-user');
    }
    public function index(){
        return view('front.users.liste-utilisateur');
    }
}
