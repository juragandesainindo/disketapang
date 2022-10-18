<?php

namespace App\Http\Controllers\Distribusi;

use App\Http\Controllers\Controller;
use App\Models\Flyer;
use Illuminate\Http\Request;

class FlyerController extends Controller
{
    public function index()
    {
        $data = Flyer::all();
        return view('distribusi.flyer.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('distribusi/flyer'), $imageName);
            
            $data = new Flyer([
                'file'      => $imageName
                ]);
            
            $data->save();
        }
        
        return back()->with('success','Create flyer successfully');
    }
    
    public function show($id)
    {
        $data = Flyer::findOrFail($id);
        return view('distribusi.flyer.show',compact('data'));
    }
}
