<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Http\Requests\keuangan\ReferensiTufoksiRequest;
use App\Models\ReferensiTufoksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ReferensiTufoksiController extends Controller
{
    public function index()
    {
        $referensi = ReferensiTufoksi::orderBy('tanggal', 'desc')->get();
        return view('keuangan.referensi.index', compact('referensi'));
    }

    public function create()
    {
        return view('keuangan.referensi.create');
    }

    public function store(ReferensiTufoksiRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('keuangan/referensi'), $imageName);
            $input['file'] = $imageName;
        }

        ReferensiTufoksi::create($input);

        Alert::success('Success', 'Create referensi tufoksi has been successfully');

        return back();
    }

    public function edit($id)
    {
        $referensi = ReferensiTufoksi::findOrFail($id);
        return view('keuangan.referensi.edit', compact('referensi'));
    }

    public function update(Request $request, $id)
    {
        $referensi = ReferensiTufoksi::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile("file")) {
            if (File::exists("keuangan/referensi/" . $referensi->file)) {
                File::delete("keuangan/referensi/" . $referensi->file);
            }
            $file = $request->file("file");
            $referensi->file = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("keuangan/referensi"), $referensi->file);
            $request['file'] = $referensi->file;
        }

        $input['file'] = $referensi->file;

        $referensi->update($input);

        Alert::success('Success', 'Update referensi tufoksi has been successfully');

        return redirect()->route('referensi-tufoksi.index');
    }

    public function destroy($id)
    {
        $referensi = ReferensiTufoksi::findOrFail($id);

        if (File::exists("keuangan/referensi/" . $referensi->file)) {
            File::delete("keuangan/referensi/" . $referensi->file);
        }

        $referensi->delete();

        Alert::error('Delete', 'Delete referensi tufoksi has been successfully');

        return back();
    }
}