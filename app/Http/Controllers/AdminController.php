<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return Inertia::render('Admin/Dashboard');
    }
    public function blogcategory(){
        return Inertia::render('Admin/BlogCategory');
    }
    public function blog(){
        return Inertia::render('Admin/Blog');
    }
    public function review(){
        return Inertia::render('Admin/Review');
    }
    public function users(){
        return Inertia::render('Admin/User');
    }
}
