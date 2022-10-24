<?php

namespace App\Http\Controllers\umum\manyToMany;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Hadiah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelHadiahController extends Controller
{
    public function hadiah()
    {
        $hadiah = Hadiah::all();
        $artikel = Artikel::all();
        return view('umum.manytomany.index', compact('hadiah', 'artikel'));
    }

    public function storeHadiah(Request $request)
    {
        Hadiah::create($request->all());
        Alert::success('Success', 'Create hadiah has been successfully');
        return back();
    }

    public function storeArtikel(Request $request)
    {
        $artikel = Artikel::create($request->all());
        $artikel->hadiah()->attach($request->input('hadiah_id'));

        return back();
    }
}