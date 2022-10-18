<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SopController extends Controller
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
        $sop = Sop::orderBy('id', 'desc')->paginate(12);
        return view('umum.sop.index', compact('sop', 'edit', 'delete'));
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
            $file->move(\public_path('umum/sop'), $imageName);

            $sop = new Sop([
                'title'       => $request->title,
                'file'        => $imageName
            ]);

            $sop->save();
        }
        return redirect()->route('sop.index')->with('success', 'Create SOP successfully');
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
        $sop = Sop::findOrFail($id);
        if ($request->hasFile("file")) {
            if (File::exists("umum/sop/" . $sop->file)) {
                File::delete("umum/sop/" . $sop->file);
            }
            $file = $request->file("file");
            $sop->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/umum/sop"), $sop->file);
            $request['file'] = $sop->file;
        }

        $sop->update([
            'title'       => $request->title,
            'file'        => $sop->file
        ]);

        return redirect()->route('sop.index')->with('success', 'Edit SOP successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sop = Sop::findOrFail($id);

        if (File::exists("umum/sop/" . $sop->file)) {
            File::delete("umum/sop/" . $sop->file);
        }

        Sop::find($id)->delete();

        return redirect()->route('sop.index')->with('success', 'Delete SOP successfully.');
    }
}