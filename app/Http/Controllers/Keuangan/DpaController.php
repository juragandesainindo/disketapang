<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Dpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DpaController extends Controller
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
        $dpa = Dpa::orderBy('updated_at', 'desc')->paginate(12);
        return view('keuangan.dpa.index', compact('dpa', 'edit', 'delete'));
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
            $file->move(\public_path('keuangan/dpa'), $imageName);

            $dpa = new Dpa([
                'title' => $request->title,
                'file'  => $imageName
            ]);

            $dpa->save();
        }

        return redirect()->route('dpa.index')->with('success', 'Create DPA successfully');
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
        $dpa = Dpa::findOrFail($id);

        if ($request->hasFile('file')) {
            if (File::exists('keuangan/dpa/' . $dpa->file)) {
                File::delete('keuangan/dpa/' . $dpa->file);
            }
            $file = $request->file('file');
            $dpa->file = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('keuangan/dpa'), $dpa->file);
            $request['file'] = $dpa->file;
        }

        $dpa->update([
            'title'       => $request->title,
            'file'        => $dpa->file
        ]);

        return redirect()->route('dpa.index')->with('success', 'Edit DPA successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpa = Dpa::findOrFail($id);

        if (File::exists("keuangan/dpa/" . $dpa->file)) {
            File::delete("keuangan/dpa/" . $dpa->file);
        }

        Dpa::find($id)->delete();

        return redirect()->route('dpa.index')->with('success', 'Delete DPA successfully.');
    }
}