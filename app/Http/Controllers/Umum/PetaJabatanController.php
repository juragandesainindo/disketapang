<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\PetaJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PetaJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $delete = 1;
        $peta = PetaJabatan::orderBy('id', 'desc')->paginate(9);
        return view('umum.peta-jabatan.index', compact('peta', 'edit', 'delete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/peta-jabatan'), $imageName);

            $kendaraan = new PetaJabatan([
                'title'       => $request->title,
                'file'            => $imageName
            ]);

            $kendaraan->save();
        }
        return redirect()->route('peta-jabatan.index')->with('success', 'Create peta jabatan successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peta = PetaJabatan::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("umum/peta-jabatan/" . $peta->file)) {
                File::delete("umum/peta-jabatan/" . $peta->file);
            }
            $file = $request->file("file");
            $peta->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("umum/peta-jabatan"), $peta->file);
            $request['file'] = $peta->file;
        }

        $peta->update([
            'title'       => $request->title,
            'file'        => $peta->file
        ]);

        return redirect()->route('peta-jabatan.index')->with('success', 'Edit peta jabatan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peta = PetaJabatan::findOrFail($id);

        if (File::exists("umum/peta-jabatan/" . $peta->file)) {
            File::delete("umum/peta-jabatan/" . $peta->file);
        }

        PetaJabatan::find($id)->delete();

        return redirect()->route('peta-jabatan.index')->with('success', 'Delete peta jabatan successfully.');
    }
}