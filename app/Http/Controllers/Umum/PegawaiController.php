<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Ortu;
use App\Models\Jabatan;
use App\Models\Organisasi;
use App\Models\Pegawai;
use App\Models\PegawaiImage;
use App\Models\Pangkat;
use App\Models\PelatihanKepemimpinan;
use App\Models\PelatihanTeknis;
use App\Models\Pendidikan;
use App\Models\Penghargaan;
use App\Models\Pasangan;
use App\Models\PegawaiGaji;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Exports\PegawaiDukExport;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;
use DB;

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
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama'  => 'required',
            "npwp" => 'required',
            "jk" => 'required',
            "tempat_lahir" => 'required',
            "tgl_lahir" => 'required',
            "agama" => 'required',
            "alamat" => 'required',
            "telepon" => 'required',
            "email" => 'required',
            "bpjs" => 'required',
            "foto" => 'required',
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai"), $imageName);

            $pegawai = new Pegawai([
                "nip" => $request->nip,
                "nama" => $request->nama,
                "npwp" => $request->npwp,
                "jk" => $request->jk,
                "tempat_lahir" => $request->tempat_lahir,
                "tgl_lahir" => $request->tgl_lahir,
                "agama" => $request->agama,
                "alamat" => $request->alamat,
                "telepon" => $request->telepon,
                "email" => $request->email,
                "bpjs" => $request->bpjs,
                "foto" => $imageName,
            ]);
            $pegawai->save();
        }

        return redirect()->route('pegawais.index')->with('success', 'Pegawai uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editPangkat = 1;
        $editJabatan = 1;
        $editPendidikanUmum = 1;
        $editPelatihanKepemimpinan = 1;
        $editPelatihanTeknis = 1;
        $editOrganisasi = 1;
        $editPenghargaan = 1;
        $editPasangan = 1;
        $editAnak = 1;
        $editOrtu = 1;
        $editDokumenPegawai = 1;
        $editGaji = 1;
        $pegawai = Pegawai::findOrFail($id);
        return view('umum.pegawai.show', compact('pegawai', 'editPangkat', 'editJabatan', 'editPendidikanUmum', 'editPelatihanKepemimpinan', 'editPelatihanTeknis', 'editOrganisasi', 'editPenghargaan', 'editPasangan', 'editAnak', 'editOrtu', 'editDokumenPegawai', 'editGaji'));
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
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($request->hasFile("foto")) {
            if (File::exists("umum/pegawai/" . $pegawai->foto)) {
                File::delete("umum/pegawai/" . $pegawai->foto);
            }
            $file = $request->file("foto");
            $pegawai->foto = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai"), $pegawai->foto);
            $request['pegawai'] = $pegawai->foto;
        }

        $pegawai->update([
            "nip" => $request->nip,
            "nama" => $request->nama,
            "npwp" => $request->npwp,
            "jk" => $request->jk,
            "tempat_lahir" => $request->tempat_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "agama" => $request->agama,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon,
            "email" => $request->email,
            "bpjs" => $request->bpjs,
            "foto" => $pegawai->foto,
        ]);

        // if($request->hasFile("images")){
        //     $files=$request->file("images");
        //     foreach($files as $file){
        //         $imageName=time().'_'.$file->getClientOriginalName();
        //         $request['image_pegawai']=$imageName;
        //         $request['pegawai_id']=$id;
        //         $file->move(\public_path("umum/pegawai/all"),$imageName);
        //         PegawaiImage::create($request->all());

        //     }
        // }

        return redirect()->route('pegawais.index')->with('success', 'Pegawai edit successfully');
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
        if (File::exists("umum/pegawai/" . $pegawai->foto)) {
            File::delete("umum/pegawai/" . $pegawai->foto);
        }
        Pegawai::find($id)->delete();



        return redirect()->route('pegawais.index')->with('success', 'Delete Pegawai successfully');
    }

    public function deleteImage($id)
    {
        $images = PegawaiImage::findOrFail($id);
        if (File::exists('umum/pegawai/all/' . $images->image_pegawai)) {
            File::delete('umum/pegawai/all/' . $images->image_pegawai);
        }

        PegawaiImage::find($id)->delete();


        return back();
    }


    public function storePangkat(Request $request)
    {
        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai/pangkat"), $imageName);

            $pangkat = new Pangkat([
                "nama_pangkat" => $request->nama_pangkat,
                "no_sk" => $request->no_sk,
                "tgl_sk" => $request->tgl_sk,
                "tmt_pangkat" => $request->tmt_pangkat,
                "foto" => $imageName,
                "pegawai_id" => $request->pegawai_id,

            ]);
            $pangkat->save();
        }
        return back()->with('success', 'Create pangkat successfully.');
    }

    public function updatePangkat(Request $request, $id)
    {

        $pangkat = Pangkat::findOrFail($id);
        if ($request->hasFile("foto")) {
            if (File::exists("umum/pegawai/pangkat/" . $pangkat->foto)) {
                File::delete("umum/pegawai/pangkat/" . $pangkat->foto);
            }
            $file = $request->file("foto");
            $pangkat->foto = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai/pangkat"), $pangkat->foto);
            $request['pangkat'] = $pangkat->foto;
        }

        $pangkat->update([
            "nama_pangkat" => $request->nama_pangkat,
            "no_sk" => $request->no_sk,
            "tgl_sk" => $request->tgl_sk,
            "tmt_pangkat" => $request->tmt_pangkat,
            "foto" => $pangkat->foto,
        ]);

        return back()->with('success', 'Edit pangkat successfully.');
    }

    public function destroyPangkat($id)
    {
        $pangkat = Pangkat::findOrFail($id);
        if (File::exists("umum/pegawai/pangkat/" . $pangkat->foto)) {
            File::delete("umum/pegawai/pangkat/" . $pangkat->foto);
        }
        Pangkat::find($id)->delete();
        return back()->with('success', 'Delete pangkat successfully.');
    }

    public function storeJabatan(Request $request)
    {
        $request->validate([
            'nama_jabatan'  => 'required',
            'eselon'        => 'required',
            'tmt_jabatan'   => 'required',
            'akhir_jabatan' => 'required',
            'foto'          => 'image|max:20480',
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai/jabatan"), $imageName);

            $jabatan = new Jabatan([
                "nama_jabatan" => $request->nama_jabatan,
                "eselon" => $request->eselon,
                "tmt_jabatan" => $request->tmt_jabatan,
                "akhir_jabatan" => $request->akhir_jabatan,
                "foto" => $imageName,
                "pegawai_id" => $request->pegawai_id,

            ]);
            $jabatan->save();
        }

        return back()->with('success', 'Create jabatan successfully.');
    }

    public function updateJabatan(Request $request, $id)
    {
        $data = Jabatan::findOrFail($id);

        if ($request->hasFile("foto")) {
            if (File::exists("umum/pegawai/jabatan/" . $data->foto)) {
                File::delete("umum/pegawai/jabatan/" . $data->foto);
            }
            $file = $request->file("foto");
            $data->foto = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("umum/pegawai/jabatan"), $data->foto);
            $request['jabatan'] = $data->foto;
        }

        $data->update([
            "nama_jabatan" => $request->nama_jabatan,
            "eselon" => $request->eselon,
            "tmt_jabatan" => $request->tmt_jabatan,
            "akhir_jabatan" => $request->akhir_jabatan,
            "foto" => $data->foto,
        ]);

        return back()->with('success', 'Edit jabatan successfully.');
    }

    public function destroyJabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        if (File::exists("umum/pegawai/jabatan/" . $jabatan->foto)) {
            File::delete("umum/pegawai/jabatan/" . $jabatan->foto);
        }
        Jabatan::find($id)->delete();
        return back()->with('success', 'Delete jabatan successfully.');
    }

    public function storePendidikanUmum(Request $request)
    {

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pendidikan-umum'), $imageName);

            $pendidikanUmum = new Pendidikan([
                'jenjang_pendidikan'    => $request->jenjang_pendidikan,
                'jurusan'               => $request->jurusan,
                'nama_sekolah'          => $request->nama_sekolah,
                'tahun_lulus'           => $request->tahun_lulus,
                'foto'                  => $imageName,
                'pegawai_id'            => $request->pegawai_id
            ]);

            $pendidikanUmum->save();
        }

        return back()->with('success', 'Create pendidikan umum successfully.');
    }

    public function updatePendidikanUmum(Request $request, $id)
    {
        $pendidikanUmum = Pendidikan::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/pendidikan-umum/' . $pendidikanUmum->foto)) {
                File::delete('umum/pegawai/pendidikan-umum/' . $pendidikanUmum->foto);
            }

            $file = $request->file('foto');
            $pendidikanUmum->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pendidikan-umum'), $pendidikanUmum->foto);
            $request['pendidikan_umum'] = $pendidikanUmum->foto;
        }

        $pendidikanUmum->update([
            "jenjang_pendidikan"    => $request->jenjang_pendidikan,
            "jurusan"               => $request->jurusan,
            "nama_sekolah"          => $request->nama_sekolah,
            "tahun_lulus"           => $request->tahun_lulus,
            "foto"                  => $pendidikanUmum->foto,
        ]);

        return back()->with('success', 'Edit pendidikan umum successfully.');
    }

    public function destroyPendidikanUmum($id)
    {
        $pendidikanUmum = Pendidikan::findOrFail($id);

        if (File::exists('umum/pegawai/pendidikan-umum/' . $pendidikanUmum->foto)) {
            File::delete('umum/pegawai/pendidikan-umum/' . $pendidikanUmum->foto);
        }
        Pendidikan::find($id)->delete();
        return back()->with('success', 'Delete pendidikan umum successfully.');
    }

    public function storePelatihanKepemimpinan(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-kepemimpinan'), $imageName);

            $data = new PelatihanKepemimpinan([
                'nama_diklat'       => $request->nama_diklat,
                'angkatan'          => $request->angkatan,
                'tahun'             => $request->tahun,
                'tempat'            => $request->tempat,
                'panitia'           => $request->panitia,
                'foto'              => $imageName,
                'pegawai_id'        => $request->pegawai_id
            ]);

            $data->save();
        }

        return back()->with('success', 'Create pelatihan kepemimpinan successfully.');
    }

    public function updatePelatihanKepemimpinan(Request $request, $id)
    {
        $data = PelatihanKepemimpinan::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/pelatihan-kepemimpinan/' . $data->foto)) {
                File::delete('umum/pegawai/pelatihan-kepemimpinan/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-kepemimpinan'), $data->foto);
            $request['pelatihan_kepemimpinan'] = $data->foto;
        }

        $data->update([
            'nama_diklat'       => $request->nama_diklat,
            'angkatan'          => $request->angkatan,
            'tahun'             => $request->tahun,
            'tempat'            => $request->tempat,
            'panitia'           => $request->panitia,
            'foto'              => $data->foto
        ]);

        return back()->with('success', 'Edit pelatihan kepemimpinan successfully.');
    }

    public function destroyPelatihanKepemimpinan($id)
    {
        $data = PelatihanKepemimpinan::findOrFail($id);

        if (File::exists('umum/pegawai/pelatihan-kepemimpinan/' . $data->foto)) {
            File::delete('umum/pegawai/pelatihan-kepemimpinan/' . $data->foto);
        }

        PelatihanKepemimpinan::find($id)->delete();
        return back()->with('success', 'Delete pelatihan kepemimpinan successfully.');
    }

    public function storePelatihanTeknis(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-teknis'), $imageName);

            $data = new PelatihanTeknis([
                'nama_diklat'   => $request->nama_diklat,
                'angkatan'      => $request->angkatan,
                'tahun'         => $request->tahun,
                'tempat'        => $request->tempat,
                'panitia'       => $request->panitia,
                'foto'          => $imageName,
                'pegawai_id'    => $request->pegawai_id
            ]);

            $data->save();
        }

        return back()->with('success', 'Create pelatihan teknis successfully');
    }

    public function updatePelatihanTeknis(Request $request, $id)
    {
        $data = PelatihanTeknis::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/pelatihan-teknis/' . $data->foto)) {
                File::delete('umum/pegawai/pelatihan-teknis/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pelatihan-teknis'), $data->foto);
            $request['pelatihan_teknis'] = $data->foto;
        }

        $data->update([
            'nama_diklat'   => $request->nama_diklat,
            'angkatan'      => $request->angkatan,
            'tahun'         => $request->tahun,
            'tempat'        => $request->tempat,
            'panitia'       => $request->panitia,
            'foto'          => $data->foto,
        ]);

        return back()->with('success', 'Edit pelatihan teknis successfully.');
    }

    public function destroyPelatihanTeknis($id)
    {
        $data = PelatihanTeknis::findOrFail($id);

        if (File::exists('umum/pegawai/pelatihan-teknis/' . $data->foto)) {
            File::delete('umum/pegawai/pelatihan-teknis/' . $data->foto);
        }
        PelatihanTeknis::find($id)->delete();
        return back()->with('success', 'Delete pelatihan teknis successfully.');
    }

    public function storeOrganisasi(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/organisasi'), $imageName);

            $data = new Organisasi([
                'nama_organisasi'   => $request->nama_organisasi,
                'kedudukan'         => $request->kedudukan,
                'tempat'            => $request->tempat,
                'nama_pimpinan'     => $request->nama_pimpinan,
                'foto'              => $imageName,
                'pegawai_id'        => $request->pegawai_id
            ]);

            $data->save();
        }

        return back()->with('success', 'Create organisasi successfully.');
    }

    public function updateOrganisasi(Request $request, $id)
    {
        $data = Organisasi::findOrFail($id);
        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/organisasi/' . $data->foto)) {
                File::delete('umum/pegawai/organisasi/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/organisasi'), $data->foto);
            $request['organisasi'] = $data->foto;
        }

        $data->update([
            'nama_organisasi'   => $request->nama_organisasi,
            'kedudukan'         => $request->kedudukan,
            'tempat'            => $request->tempat,
            'nama_pimpinan'     => $request->nama_pimpinan,
            'foto'              => $data->foto
        ]);

        return back()->with('success', 'Update organisasi successfully');
    }

    public function destroyOrganisasi($id)
    {
        $data = Organisasi::findOrFail($id);

        if (File::exists('umum/pegawai/organisasi/' . $data->foto)) {
            File::delete('umum/pegawai/organisasi/' . $data->foto);
        }
        Organisasi::find($id)->delete();
        return back()->with('success', 'Delete organisasi successfully');
    }

    public function storePenghargaan(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/penghargaan'), $imageName);

            $data = new Penghargaan([
                'penghargaan'   => $request->penghargaan,
                'tahun'         => $request->tahun,
                'asal_perolehan'    => $request->asal_perolehan,
                'foto'          => $imageName,
                'pegawai_id'    => $request->pegawai_id
            ]);

            $data->save();
        }

        return back()->with('success', 'Create penghargaan successfully');
    }

    public function updatePenghargaan(Request $request, $id)
    {
        $data = Penghargaan::findOrFail($id);
        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/penghargaan/' . $data->foto)) {
                File::delete('umum/pegawai/penghargaan/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/penghargaan'), $data->foto);
            $request['pegawai_penghargaan'] = $data->foto;
        }

        $data->update([
            'penghargaan'    => $request->penghargaan,
            'tahun'          => $request->tahun,
            'asal_perolehan' => $request->asal_perolehan,
            'foto'           => $data->foto
        ]);

        return back()->with('success', 'Update penghargaan successfully');
    }

    public function destroyPenghargaan($id)
    {
        $data = Penghargaan::findOrFail($id);
        if (File::exists('umum/pegawai/penghargaan/' . $data->foto)) {
            File::delete('umum/pegawai/penghargaan/' . $data->foto);
        }
        Penghargaan::find($id)->delete();
        return back()->with('success', 'Delete penghargaan successfully');
    }

    public function storePasangan(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pasangan'), $imageName);

            $data = new Pasangan([
                'nama_pasangan' => $request->nama_pasangan,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'tgl_nikah' => $request->tgl_nikah,
                'pekerjaan' => $request->pekerjaan,
                'foto'      => $imageName,
                'pegawai_id' => $request->pegawai_id,
            ]);

            $data->save();
        }

        return back()->with('success', 'Create pasangan successfully');
    }

    public function updatePasangan(Request $request, $id)
    {
        $data = Pasangan::findOrFail($id);

        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/pasangan/' . $data->foto)) {
                File::delete('umum/pegawai/pasangan/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/pasangan'), $data->foto);
            $request['pegawai_pasangan'] = $data->foto;
        }

        $data->update([
            'nama_pasangan' => $request->nama_pasangan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_nikah' => $request->tgl_nikah,
            'foto'      => $data->foto,
            'pekerjaan' => $request->pekerjaan,
        ]);
        return back()->with('success', 'Update pasangan successfully');
    }

    public function destroyPasangan($id)
    {
        $data = Pasangan::findOrFail($id);

        if (File::exists('umum/pegawai/pasangan/' . $data->foto)) {
            File::delete('umum/pegawai/pasangan/' . $data->foto);
        }
        Pasangan::find($id)->delete();
        return back()->with('success', 'Delete pasangan successfully');
    }

    public function storeAnak(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/anak'), $imageName);

            $data = new Anak([
                'nama_anak'     => $request->nama_anak,
                'tempat_lahir'  => $request->tempat_lahir,
                'tgl_lahir'     => $request->tgl_lahir,
                'status_anak'   => $request->status_anak,
                'pekerjaan'     => $request->pekerjaan,
                'foto'          => $imageName,
                'pegawai_id'    => $request->pegawai_id,
            ]);

            $data->save();
        }

        return back()->with('success', 'Create anak successfully');
    }

    public function updateAnak(Request $request, $id)
    {
        $data = Anak::findOrFail($id);
        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/anak/' . $data->foto)) {
                File::delete('umum/pegawai/anank/' . $data->foto);
            }
            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/anak'), $data->foto);
            $request['pegawai_anak'] = $data->foto;
        }

        $data->update([
            'nama_anak'     => $request->nama_anak,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'status_anak'   => $request->status_anak,
            'pekerjaan'     => $request->pekerjaan,
            'foto'          => $data->foto
        ]);

        return back()->with('success', 'Update anak successfully');
    }

    public function destroyAnak($id)
    {
        $data = Anak::findOrFail($id);
        if (File::exists('umum/pegawai/anak/' . $data->foto)) {
            File::delete('umum/pegawai/anak/' . $data->foto);
        }
        Anak::find($id)->delete();
        return back()->with('success', 'Delete anak successfully');
    }

    public function storeOrtu(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ortu'), $imageName);

            $ortu = new Ortu([
                'nama_ortu' => $request->nama_ortu,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'status_ortu' => $request->status_ortu,
                'pekerjaan' => $request->pekerjaan,
                'foto'      => $imageName,
                'pegawai_id' => $request->pegawai_id,
            ]);

            $ortu->save();
        }


        return back()->with('success', 'Create orang tua successfully');
    }

    public function updateOrtu(Request $request, $id)
    {
        $data = Ortu::findOrFail($id);
        if ($request->hasFile('foto')) {
            if (File::exists('umum/pegawai/ortu/' . $data->foto)) {
                File::delete('umum/pegawai/ortu/' . $data->foto);
            }

            $file = $request->file('foto');
            $data->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/ortu'), $data->foto);
            $request['pegawai_ortu'] = $data->foto;
        }

        $data->update([
            'nama_ortu' => $request->nama_ortu,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'status_ortu' => $request->status_ortu,
            'pekerjaan' => $request->pekerjaan,
            'foto'      => $data->foto,
        ]);

        return back()->with('success', 'Update orang tua successfully');
    }

    public function destroyOrtu($id)
    {
        $data = Ortu::findOrFail($id);
        if (File::exists('umum/pegawai/ortu/' . $data->foto)) {
            File::delete('umum/pegawai/ortu/' . $data->foto);
        }
        Ortu::find($id)->delete();
        return back()->with('success', 'Delete orang tua successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new PegawaiDukExport, 'pegawai.xlsx');
    }

    public function storeDokumenPegawai(Request $request)
    {
        if ($request->hasFile('image_pegawai')) {
            $file = $request->file('image_pegawai');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/dokumen'), $imageName);

            $data = new PegawaiImage([
                'keterangan'    => $request->keterangan,
                'image_pegawai' => $imageName,
                'pegawai_id'    => $request->pegawai_id,
            ]);

            $data->save();
        }

        return back()->with('success', 'Create Dokumen successfully');
    }

    public function updateDokumenPegawai(Request $request, $id)
    {
        $data = PegawaiImage::findOrFail($id);

        if ($request->hasFile('image_pegawai')) {
            if (File::exists('umum/pegawai/dokumen/' . $data->image_pegawai)) {
                File::delete('umum/pegawai/dokumen/' . $data->image_pegawai);
            }
            $file = $request->file('image_pegawai');
            $data->image_pegawai = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('umum/pegawai/dokumen'), $data->image_pegawai);
            $request['pegawai_image'] = $data->image_pegawai;
        }

        $data->update([
            'keterangan'    => $request->keterangan,
            'image_pegawai' => $data->image_pegawai,
        ]);

        return back()->with('success', 'Update Dokumen successfully');
    }

    public function destroyDokumenPegawai($id)
    {
        $data = PegawaiImage::findOrFail($id);

        if (File::exists('umum/pegawai/dokumen/' . $data->image_pegawai)) {
            File::delete('umum/pegawai/dokumen/' . $data->image_pegawai);
        }

        PegawaiImage::find($id)->delete();

        return back()->with('success', 'Delete Dokumen successfully');
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
