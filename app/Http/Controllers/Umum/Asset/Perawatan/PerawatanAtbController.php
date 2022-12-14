<?php

namespace App\Http\Controllers\Umum\Asset\Perawatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\umum\asset\PerawatanAssetRequest;
use App\Models\AssetUmum;
use App\Models\PerawatanAssetUmum;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PerawatanAtbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = $request->get('search');
        if ($request->has('search')) {
            $kibs = PerawatanAssetUmum::whereHas('assetUmum', function ($q) use ($filter) {
                $q->where('kategori', 'Atb')->where('penanggung_jawab', '=', $filter);
            })->get();
        } else {
            $kibs = PerawatanAssetUmum::whereHas('assetUmum', function ($q) {
                $q->where('kategori', 'Atb');
            })->orderBy('id', 'desc')->get();
        }
        return view('umum.asset.perawatan-asset.atb.index', compact('kibs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kibs = AssetUmum::where('kategori', 'Atb')->get();
        return view('umum.asset.perawatan-asset.atb.create', compact('kibs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerawatanAssetRequest $request)
    {
        $input = $request->validated();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/atb'), $imageName);
            $input['foto'] = $imageName;
        }

        require_once 'StoreFormatUang.php';
        PerawatanAssetUmum::create($input);

        Alert::success('Success', 'Create Perawatan Asset Tak Berwujud has been successfully');

        return redirect()->route('perawatan-asset-tak-berwujud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        require_once 'Show.php';

        $pdf = PDF::loadView('umum.asset.perawatan-asset.atb.pdf', compact('kib', 'namakasubUmum', 'nipkasubUmum'))
            ->setPaper('a4', 'landscape');
        $fileName = date(now());
        return $pdf->stream($fileName . ' Perawatan Asset ATB.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        $modelKib = AssetUmum::where('kategori', 'Atb')->get();
        return view('umum.asset.perawatan-asset.atb.edit', compact('kib', 'modelKib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerawatanAssetRequest $request, $id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("umum/asset/perawatan/atb/" . $kib->foto)) {
                File::delete("umum/asset/perawatan/atb/" . $kib->foto);
            }
            $file = $request->file('foto');
            $kib->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/asset/perawatan/atb'), $kib->foto);
            $request['foto'] = $kib->foto;
        }
        $input['foto'] = $kib->foto;

        require_once 'StoreFormatUang.php';
        $kib->update($input);

        Alert::success('Success', 'Update Perawatan Asset Tak Berwujud has been successfully');

        return redirect()->route('perawatan-asset-tak-berwujud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kib = PerawatanAssetUmum::findOrFail($id);
        if (File::exists("umum/asset/perawatan/atb/" . $kib->foto)) {
            File::delete("umum/asset/perawatan/atb/" . $kib->foto);
        }
        PerawatanAssetUmum::findOrFail($id)->delete();
        Alert::error('Delete', 'Delete Perawatan Asset Tak Berwujud has been successfully');

        return redirect()->route('perawatan-asset-tak-berwujud.index');
    }
}