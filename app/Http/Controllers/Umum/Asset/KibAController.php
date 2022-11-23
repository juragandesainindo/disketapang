<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\KibARequest;
use App\Models\AssetUmum;
use App\Models\MappingAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class KibAController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kibs = AssetUmum::where('kategori', '=', 'KibA')
                ->where('penanggung_jawab', 'LIKE', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $kibs = AssetUmum::where('kategori', '=', 'KibA')->orderBy('created_at', 'desc')->get();
        }

        $totalNilaiBrg = $kibs->sum('nilai_brg');
        $totalNilaiTotal = $kibs->sum('nilai_perolehan');
        $totalNilaiSurut = $kibs->sum('nilai_surut');

        return view('umum.asset.kib-a.index', compact('kibs', 'totalNilaiBrg', 'totalNilaiTotal', 'totalNilaiSurut'));
    }

    public function create()
    {
        $mapping = MappingAsset::where('kategori', 'KibA')->get();
        return view('umum.asset.kib-a.create', compact('mapping'));
    }

    public function store(KibARequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-a'), $imageName);
            $input['foto'] = $imageName;
        }


        require_once 'StoreFormatUang.php';
        AssetUmum::create($input);

        Alert::success('Success', 'Create Kib A has been successfully');

        return redirect()->route('kib-a.index');
        // ->with('success', 'Create Kib A has been successfully')
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kib = AssetUmum::findOrFail($id);
        $mapping = MappingAsset::where('kategori', 'KibA')->get();
        return view('umum.asset.kib-a.edit', compact('kib', 'mapping'));
    }

    public function update(KibARequest $request, $id)
    {
        $kib = AssetUmum::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/kib-a/" . $kib->foto)) {
                File::delete("umum/asset/kib-a/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/kib-a'), $kib->foto);
            $request['foto'] = $kib->foto;
        }

        require_once 'StoreFormatUang.php';

        $input['foto'] = $kib->foto;
        $kib->update($input);

        Alert::success('Success', 'Update Kib A has been successfully');

        return redirect()->route('kib-a.index');
    }

    public function destroy($id)
    {

        $kib = AssetUmum::findOrFail($id);
        if (File::exists("umum/asset/kib-a/" . $kib->foto)) {
            File::delete("umum/asset/kib-a/" . $kib->foto);
        }
        AssetUmum::find($id)->delete();

        Alert::error('Delete', 'Delete Kib A has been successfully');
        // toast('Your Post as been submited!', 'success');

        return redirect()->route('kib-a.index');
        // ->with('success', 'Delete Kib A has been successfully')
    }
}