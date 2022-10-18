<?php

namespace App\Http\Controllers\Kerawanan;

use App\Http\Controllers\Controller;
use App\Models\DataPrognosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataPrognosaController extends Controller
{
    public function index()
    {
        $edit = 1;
        $data = DataPrognosa::orderBy('id','desc')->get();
        return view('kerawanan.data-prognosa.index', compact('data','edit'));
    }
    
    public function store(Request $request)
    {
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $imageName = time().'_'. $file->getClientOriginalName();
            $file->move(\public_path('kerawanan/data-prognosa'), $imageName);
            
            $data = new DataPrognosa([
                'title'     => $request->title,
                'file'      => $imageName
                ]);
            
            $data->save();
        }
        
        return back()->with('success','Create data prognosa successfully');
    }
    
    public function update(Request $request, $id)
    {
        $data = DataPrognosa::findOrFail($id);
             if($request->hasFile("file")){
                 if (File::exists("kerawanan/data-prognosa/".$data->file)) {
                     File::delete("kerawanan/data-prognosa/".$data->file);
                 }
                 $file=$request->file("file");
                 $data->file=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("kerawanan/data-prognosa"),$data->file);
                 $request['file']=$data->file;
             }

        $data->update([
            'title'          => $request->title,
            'file'           => $data->file
        ]);

        return back()->with('success', 'Edit data prognosa successfully.');
    }
    
    public function destroy($id)
    {
        $data = DataPrognosa::findOrFail($id);
		if (File::exists('kerawanan/data-prognosa/'.$data->file)) {
			File::delete('kerawanan/data-prognosa/'.$data->file);
		}

		DataPrognosa::find($id)->delete();

		return back()->with('success','Delete data prognosa successfully');
    }
}