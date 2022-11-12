<?php

namespace App\Http\Controllers;

use App\Models\AddMoreInput;
use Illuminate\Http\Request;

class AddMoreInputController extends Controller
{
    public function index()
    {
        $data = AddMoreInput::all();
        return view('addMoreInput.index', compact('data'));
    }

    public function create()
    {
        return view('addMoreInput.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            AddMoreInput::create($value);
        }

        return back()->with('success', 'Record Created Successfully.');
    }
}