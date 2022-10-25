<?php

namespace App\Http\Controllers\keuangan;

use App\Exports\EvaluasiRenstraExport;
use App\Exports\RenstraExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\keuangan\EvaluasiRenstraRequest;
use App\Models\EvaluasiRenstra;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluasiRenstraController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from');
        // $to   = $request->input('to');

        if ($request->has('search')) {
            $renstra = EvaluasiRenstra::where('tahun', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('tahun')
                ->get();
        } elseif ($request->has('export')) {
            return Excel::download(new EvaluasiRenstraExport, 'evaluasi-renstra.xlsx');
        } else {
            $renstra = EvaluasiRenstra::orderByDesc('tahun')->get();
        }
        return view('keuangan.evaluasi-renstra.index', compact('renstra'));
    }

    public function export()
    {
        return Excel::download(new EvaluasiRenstraExport, 'evaluasi-renstra.xlsx');
    }

    public function create()
    {

        return view('keuangan.evaluasi-renstra.create');
    }

    public function store(EvaluasiRenstraRequest $request)
    {
        $input = $request->validated();
        EvaluasiRenstra::create($input);
        Alert::success('Success', 'Create evaluasi renstra has been successfully');
        return redirect()->route('evaluasi-renstra.index');
    }

    public function edit($id)
    {
        $renstra = EvaluasiRenstra::findOrFail($id);
        return view('keuangan.evaluasi-renstra.edit', compact('renstra'));
    }

    public function update(EvaluasiRenstraRequest $request, $id)
    {
        $renstra = EvaluasiRenstra::findOrFail($id);
        $input = $request->validated();

        $renstra->update($input);
        Alert::success('Success', 'Update evaluasi renstra has been successfully');
        return redirect()->route('evaluasi-renstra.index');
    }

    public function destroy($id)
    {
        $renstra = EvaluasiRenstra::findOrFail($id);
        $renstra->delete();
        Alert::error('Delete', 'Delete evaluasi renstra has been successfully');
        return back();
    }
}