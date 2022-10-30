<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Jabatan;
use App\Models\Organisasi;
use App\Models\Pegawai;
use App\Models\PelatihanKepemimpinan;
use App\Models\PelatihanTeknis;
use App\Models\Pendidikan;
use App\Models\Penghargaan;
use App\Models\Pasangan;
use App\Models\PegawaiGaji;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Exports\PegawaiDukExport;
use App\Http\Requests\Umum\PegawaiRequest;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit = 1;
        $pegawai = Pegawai::orderBy('id', 'desc')->get();
        return view('umum.pegawai.index', compact('pegawai', 'edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umum.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai'), $imageName);
            $input['foto_diri'] = $imageName;
        }
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/kk'), $imageName);
            $input['kk'] = $imageName;
        }
        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ktp'), $imageName);
            $input['ktp'] = $imageName;
        }
        if ($request->hasFile('akte')) {
            $file = $request->file('akte');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/akte'), $imageName);
            $input['akte'] = $imageName;
        }
        if ($request->hasFile('npwp')) {
            $file = $request->file('npwp');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/npwp'), $imageName);
            $input['npwp'] = $imageName;
        }
        if ($request->hasFile('bpjs')) {
            $file = $request->file('bpjs');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/bpjs'), $imageName);
            $input['bpjs'] = $imageName;
        }

        Pegawai::create($input);

        Alert::success('Success', 'Create pegawai has been successfully');

        return redirect()->route('pegawais.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('umum.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('umum.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile('foto_diri')) {
            if (File::exists("umum/pegawai/" . $pegawai->foto_diri)) {
                File::delete("umum/pegawai/" . $pegawai->foto_diri);
            }
            $file = $request->file('foto_diri');
            $pegawai->foto_diri = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai'), $pegawai->foto_diri);
            $request['foto_diri'] = $pegawai->foto_diri;
        }
        if ($request->hasFile('kk')) {
            if (File::exists("umum/pegawai/kk/" . $pegawai->kk)) {
                File::delete("umum/pegawai/kk/" . $pegawai->kk);
            }
            $file = $request->file('kk');
            $pegawai->kk = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/kk'), $pegawai->kk);
            $request['kk'] = $pegawai->kk;
        }
        if ($request->hasFile('ktp')) {
            if (File::exists("umum/pegawai/ktp/" . $pegawai->ktp)) {
                File::delete("umum/pegawai/ktp/" . $pegawai->ktp);
            }
            $file = $request->file('ktp');
            $pegawai->ktp = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ktp'), $pegawai->ktp);
            $request['ktp'] = $pegawai->ktp;
        }
        if ($request->hasFile('akte')) {
            if (File::exists("umum/pegawai/akte/" . $pegawai->akte)) {
                File::delete("umum/pegawai/akte/" . $pegawai->akte);
            }
            $file = $request->file('akte');
            $pegawai->akte = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/akte'), $pegawai->akte);
            $request['akte'] = $pegawai->akte;
        }
        if ($request->hasFile('npwp')) {
            if (File::exists("umum/pegawai/npwp/" . $pegawai->npwp)) {
                File::delete("umum/pegawai/npwp/" . $pegawai->npwp);
            }
            $file = $request->file('npwp');
            $pegawai->npwp = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/npwp'), $pegawai->npwp);
            $request['npwp'] = $pegawai->npwp;
        }
        if ($request->hasFile('bpjs')) {
            if (File::exists("umum/pegawai/bpjs/" . $pegawai->bpjs)) {
                File::delete("umum/pegawai/bpjs/" . $pegawai->bpjs);
            }
            $file = $request->file('bpjs');
            $pegawai->bpjs = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/bpjs'), $pegawai->bpjs);
            $request['bpjs'] = $pegawai->bpjs;
        }

        $input['foto_diri'] = $pegawai->foto_diri;
        $input['kk'] = $pegawai->kk;
        $input['ktp'] = $pegawai->ktp;
        $input['akte'] = $pegawai->akte;
        $input['npwp'] = $pegawai->npwp;
        $input['bpjs'] = $pegawai->bpjs;

        $pegawai->update($input);

        Alert::success('Success', 'Update pegawai has been successfully');

        return redirect()->route('pegawais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if (File::exists("umum/pegawai/" . $pegawai->foto_diri)) {
            File::delete("umum/pegawai/" . $pegawai->foto_diri);
        }
        if (File::exists("umum/pegawai/kk/" . $pegawai->kk)) {
            File::delete("umum/pegawai/kk/" . $pegawai->kk);
        }
        if (File::exists("umum/pegawai/ktp/" . $pegawai->ktp)) {
            File::delete("umum/pegawai/ktp/" . $pegawai->ktp);
        }
        if (File::exists("umum/pegawai/akte/" . $pegawai->akte)) {
            File::delete("umum/pegawai/akte/" . $pegawai->akte);
        }
        if (File::exists("umum/pegawai/npwp/" . $pegawai->npwp)) {
            File::delete("umum/pegawai/npwp/" . $pegawai->npwp);
        }
        if (File::exists("umum/pegawai/bpjs/" . $pegawai->bpjs)) {
            File::delete("umum/pegawai/bpjs/" . $pegawai->bpjs);
        }

        foreach ($pegawai->pegawaiPangkat as $item) {
            if (File::exists("umum/pegawai/pangkat/" . $item->foto)) {
                File::delete("umum/pegawai/pangkat/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiJabatan as $item) {
            if (File::exists("umum/pegawai/jabatan/" . $item->foto)) {
                File::delete("umum/pegawai/jabatan/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pendidikanUmum as $item) {
            if (File::exists("umum/pegawai/pendidikan-umum/" . $item->foto)) {
                File::delete("umum/pegawai/pendidikan-umum/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pelatihanKepemimpinan as $item) {
            if (File::exists("umum/pegawai/pelatihan-kepemimpinan/" . $item->foto)) {
                File::delete("umum/pegawai/pelatihan-kepemimpinan/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pelatihanTeknis as $item) {
            if (File::exists("umum/pegawai/pelatihan-teknis/" . $item->foto)) {
                File::delete("umum/pegawai/pelatihan-teknis/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiOrganisasi as $item) {
            if (File::exists("umum/pegawai/organisasi/" . $item->foto)) {
                File::delete("umum/pegawai/organisasi/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiPenghargaan as $item) {
            if (File::exists("umum/pegawai/penghargaan/" . $item->foto)) {
                File::delete("umum/pegawai/penghargaan/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiPasangan as $item) {
            if (File::exists("umum/pegawai/pasangan/" . $item->foto)) {
                File::delete("umum/pegawai/pasangan/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiAnak as $item) {
            if (File::exists("umum/pegawai/anak/" . $item->foto)) {
                File::delete("umum/pegawai/anak/" . $item->foto);
            }
            $item->delete();
        }
        foreach ($pegawai->pegawaiOrtu as $item) {
            if (File::exists("umum/pegawai/ortu/" . $item->foto)) {
                File::delete("umum/pegawai/ortu/" . $item->foto);
            }
            $item->delete();
        }

        $pegawai->delete();

        Alert::error('Delete', 'Delete pegawai has been successfully');

        return redirect()->route('pegawais.index');
    }

    public function excel()
    {
        return Excel::download(new PegawaiDukExport, 'pegawai.xlsx');
    }

    public function previewPDF($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('umum.pegawai.preview-pdf', compact('pegawai'));
    }

    public function storeGajiBerkala(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/gaji'), $imageName);

            $data = new PegawaiGaji([
                'pangkat_id'    => $request->pangkat_id,
                'jabatan'       => $request->jabatan,
                'tmt_kgb'       => $request->tmt_kgb,
                'gaji_pokok'    => $request->gaji_pokok,
                'masa_kerja'    => $request->masa_kerja,
                'file'          => $imageName,
                'pegawai_id'    => $request->pegawai_id,
            ]);

            $data->save();
        }

        return back()->with('success', 'Create Gaji Berkala successfully');
    }

    public function updateGajiBerkala(Request $request, $id)
    {
        $data = PegawaiGaji::findOrFail($id);

        if ($request->hasFile('file')) {
            if (File::exists('umum/pegawai/gaji/' . $data->file)) {
                File::delete('umum/pegawai/gaji/' . $data->file);
            }
            $file = $request->file('file');
            $data->file = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/gaji'), $data->file);
            $request['file'] = $data->file;
        }

        $data->update([
            'pangkat_id'    => $request->pangkat_id,
            'jabatan'       => $request->jabatan,
            'tmt_kgb'       => $request->tmt_kgb,
            'gaji_pokok'    => $request->gaji_pokok,
            'masa_kerja'    => $request->masa_kerja,
            'file'          => $data->file,
            'pegawai_id'    => $request->pegawai_id
        ]);

        return back()->with('success', 'Update Gaji Berkala successfully');
    }

    public function destroyGajiBerkala($id)
    {
        $data = PegawaiGaji::findOrFail($id);

        if (File::exists('umum/pegawai/gaji/' . $data->file)) {
            File::delete('umum/pegawai/gaji/' . $data->file);
        }

        PegawaiGaji::find($id)->delete();

        return back()->with('success', 'Delete Gaji Berkala successfully');
    }
}