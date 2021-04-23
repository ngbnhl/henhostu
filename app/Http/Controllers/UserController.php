<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function home(){
        return Inertia::render('User/Home');
    }
    public function profile(){
        return Inertia::render('User/Profile');
    }
    public function friends(){
        return Inertia::render('User/Friends');
    }
    public function messages(){
        return Inertia::render('User/Messages');
    }
}
