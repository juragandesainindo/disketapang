<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BackgroundImageLoginController extends Controller
{
    public function index()
    {
        $images = BackgroundImage::orderByDesc('updated_at')->get();
        return view('background-image.index', compact('images'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'ket' => 'required'
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('background-login'), $imageName);
            $input['foto'] = $imageName;
        }

        BackgroundImage::create($input);
        return back()->with('success', 'Upload background login has been successfully');
    }

    public function update(Request $request, $id)
    {
        $data = BackgroundImage::findOrFail($id);
        $input = $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'ket' => 'required'
        ]);
        if ($request->hasFile('foto')) {
            if (File::exists("background-login/" . $data->foto)) {
                File::delete("background-login/" . $data->foto);
            }
            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('background-login'), $data->foto);
            $request['foto'] = $data->foto;
        }

        $input['foto'] = $data->foto;
        $data->update($input);

        return back()->with('success', 'Update background login has been successfully');
    }

    public function destroy($id)
    {

        $data = BackgroundImage::findOrFail($id);
        if (File::exists("background-login/" . $data->foto)) {
            File::delete("background-login/" . $data->foto);
        }
        BackgroundImage::find($id)->delete();

        return back()->with('success', 'Delete background login has been successfully');
    }
}