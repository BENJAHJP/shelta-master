<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index()
    {
    
    }

    public function store()
    {

    }

    public function get()
    {

    }

    public function destroy()
    {

    }

    public function search()
    {

    }
}
