<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BackgroundImageLoginController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('background-image.index', compact('users'));
    }
}