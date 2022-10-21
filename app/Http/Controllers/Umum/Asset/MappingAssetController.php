<?php

namespace App\Http\Controllers\Umum\Asset;

use App\Http\Controllers\Controller;
use App\Models\MappingAsset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MappingAssetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $mapping = MappingAsset::where('kategori', 'LIKE', '%' . $request->search . '%')->orderBy('kode_brg', 'asc')->get();
        } else {
            $mapping = MappingAsset::orderBy('kategori', 'asc')->orderBy('kode_brg', 'asc')->get();
        }
        return view('umum.asset.mapping.index', compact('mapping'));
    }

    public function store(Request $request)
    {
        MappingAsset::create([
            'kode_brg' => $request->kode_brg,
            'nama_brg' => $request->nama_brg,
            'kategori' => $request->kategori,
        ]);
        Alert::success('Success', 'Created mapping asset kib a has been successfully');
        return back();
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}