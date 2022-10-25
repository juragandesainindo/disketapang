<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Renstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Elequent\Collection;
use App\Exports\RenstraExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB as FacadesDB;

class RenstraController extends Controller
{
    public function index(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post')) {
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search')) {
                // select search
                $edit = 1;
                $delete = 1;
                $renstra = FacadesDB::select("SELECT * FROM renstra WHERE tahun BETWEEN '$from' AND '$to'");
                return view('keuangan.renstra.index', compact('renstra', 'edit', 'delete'));
            } elseif ($req->has('exportExcel')) {

                // select Excel
                return Excel::download(new RenstraExport($from, $to), 'renstra.xlsx');
            }
        } else {
            //select all
            $edit = 1;
            $delete = 1;
            $renstra = Renstra::orderBy('tahun', 'desc')->get();
            return view('keuangan.renstra.index', compact('renstra', 'edit', 'delete'));
        }
    }

    public function store(Request $request)
    {
        $renstra = new Renstra([
            'indikator'     => $request->indikator,
            'target'        => $request->target,
            'realisasi'     => $request->realisasi,
            'rasio'         => $request->rasio,
            'tahun'         => $request->tahun
        ]);

        $renstra->save();

        return back()->with('success', 'Create renstra successfully');
    }

    public function update(Request $request, $id)
    {
        $renstra = Renstra::findOrFail($id);
        $renstra->update([
            'indikator'     => $request->indikator,
            'target'        => $request->target,
            'realisasi'     => $request->realisasi,
            'rasio'         => $request->rasio,
            'tahun'         => $request->tahun
        ]);

        return back()->with('success', 'Update renstra successfully');
    }

    public function destroy($id)
    {
        Renstra::findOrFail($id)->delete();

        return back()->with('success', 'Delete renstra successfully');
    }
}