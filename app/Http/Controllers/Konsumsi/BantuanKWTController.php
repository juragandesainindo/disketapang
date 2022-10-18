<?php

namespace App\Http\Controllers\Konsumsi;

use App\Http\Controllers\Controller;
use App\Models\KwtManfaat;
use App\Models\KwtManfaatBantuan;
use App\Models\KwtProposal;
use App\Models\KwtKelompok;
use App\Models\KwtSpt;
use App\Models\KwtVerifikasi;
use App\Models\KwtSk;
use App\Models\KwtBerita;
use App\Models\KwtBeritaBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\KwtExport;
use App\Exports\KwtMonevExport;
use Maatwebsite\Excel\Facades\Excel;

class BantuanKWTController extends Controller
{
    // Daftar penerima manfaat
    public function indexDaftarPenerima()
    {
        $edit = 1;
        $kwt = KwtKelompok::all();
        $data = KwtManfaat::orderBy('tanggal','desc')->get();
        return view('konsumsi.bantuan.daftar-penerima.index', compact('kwt','data','edit'));
    }
    
    public function storeDaftarPenerima(Request $request)
    {
        $data = new KwtManfaat([
            'kwt_kelompok_id'   => $request->kwt_kelompok_id,
            'tanggal'           => $request->tanggal
        ]);
        $data->save();
        
        return back()->with('success','Create Penerima Manfaat successfully');
    }
    
    public function updateDaftarPenerima(Request $request, $id)
    {
        $data = KwtManfaat::findOrFail($id);
        $data->update([
            'kwt_kelompok_id'   => $request->kwt_kelompok_id,
            'tanggal'           => $request->tanggal
        ]);
        return back()->with('success','Update Penerima Manfaat successfully');
    }
    
    public function destroyDaftarPenerima($id)
    {
        KwtManfaat::find($id)->delete();
        return back()->with('success','Delete Penerima Manfaat successfully');
    }
    
    public function showDaftarPenerima($id)
    {
        $edit = 1;
        $data = KwtManfaat::findOrFail($id);
        return view('konsumsi.bantuan.daftar-penerima.show', compact('data','edit'));
    }
    
    public function storeDaftarPenerimaBantuan(Request $request)
    {
        $data = new KwtManfaatBantuan([
            'jenis_barang'              => $request->jenis_barang,
            'jumlah'                    => $request->jumlah,
            'satuan'                    => $request->satuan,
            'keterangan'                => $request->keterangan,
            'kwt_manfaat_id'            => $request->kwt_manfaat_id
        ]);
        $data->save();
        return back()->with('success','Create Bantuan Penerima Manfaat successfully');
    }
    
    public function updateDaftarPenerimaBantuan(Request $request, $id)
    {
        $data = KwtManfaatBantuan::findOrFail($id);
        $data->update([
            'jenis_barang'  => $request->jenis_barang,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'keterangan'    => $request->keterangan
        ]);
        return back()->with('success','Update Bantuan Penerima Manfaat successfully');
    }
    
    public function destroyDaftarPenerimaBantuan($id)
    {
        KwtManfaatBantuan::find($id)->delete();
        return back()->with('success','Delete Bantuan Penerima Manfaat successfully');
    }
    
    // Proposal
    public function indexProposal()
    {
        $edit= 1;
        $kwt = KwtKelompok::all();
        $data = KwtProposal::orderBy('id','desc')->get();
        return view('konsumsi.bantuan.proposal.index', compact('data','kwt','edit'));
    }
    
    public function storeProposal(Request $request)
    {
        if ($request->hasFile('file')) {
			$file = $request->file('file');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('konsumsi/bantuan/proposal'),$imageName);

			$data = new KwtProposal([
				'kwt_kelompok_id'	=> $request->kwt_kelompok_id,
				'keterangan'	    => $request->keterangan,
				'file'			    => $imageName
			]);

			$data->save();
		}

		return back()->with('success','Upload proposal successfully');
    }
    
    public function updateProposal(Request $request, $id)
	{
	    $data = KwtProposal::findOrFail($id);
             if($request->hasFile("file")){
                 if (File::exists("konsumsi/bantuan/proposal/".$data->file)) {
                     File::delete("konsumsi/bantuan/proposal/".$data->file);
                 }
                 $file=$request->file("file");
                 $data->file=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("konsumsi/bantuan/proposal"),$data->file);
                 $request['file']=$data->file;
             }

        $data->update([
            'kwt_kelompok_id'	=> $request->kwt_kelompok_id,
			'keterangan'	    => $request->keterangan,
			'file'			    => $data->file
        ]);

        return back()->with('success', 'Edit proposal kwt successfully.');
	}
	
	public function destroyProposal($id)
    {
        $data = KwtProposal::findOrFail($id);
		if (File::exists('konsumsi/bantuan/proposal/'.$data->file)) {
			File::delete('konsumsi/bantuan/proposal/'.$data->file);
		}

		KwtProposal::find($id)->delete();

		return back()->with('success','Delete proposal kwt successfully');
    }
    
    // SPT
    public function indexSPT()
    {
        $edit= 1;
        $data = KwtSpt::all();
        return view('konsumsi.bantuan.spt.index', compact('data','edit'));
    }
    
    public function storeSPT(Request $request)
    {
        if ($request->hasFile('file')) {
			$file = $request->file('file');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('konsumsi/bantuan/spt'),$imageName);

			$data = new KwtSpt([
				'keterangan'	    => $request->keterangan,
				'file'			    => $imageName
			]);

			$data->save();
		}

		return back()->with('success','Upload SPT CP/CL successfully');
    }
    
    public function updateSPT(Request $request, $id)
	{
	    $data = KwtSpt::findOrFail($id);
             if($request->hasFile("file")){
                 if (File::exists("konsumsi/bantuan/spt/".$data->file)) {
                     File::delete("konsumsi/bantuan/spt/".$data->file);
                 }
                 $file=$request->file("file");
                 $data->file=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("konsumsi/bantuan/spt"),$data->file);
                 $request['file']=$data->file;
             }

        $data->update([
			'keterangan'	    => $request->keterangan,
			'file'			    => $data->file
        ]);

        return back()->with('success', 'Edit SPT CP/CL successfully.');
	}
	
	public function destroySPT($id)
    {
        $data = KwtSpt::findOrFail($id);
		if (File::exists('konsumsi/bantuan/spt/'.$data->file)) {
			File::delete('konsumsi/bantuan/spt/'.$data->file);
		}

		KwtSpt::find($id)->delete();

		return back()->with('success','Delete SPT CP/CL successfully');
    }
    
    
    // VERIFIKASI
    public function indexVerifikasi()
    {
        $edit= 1;
        $proposal = KwtProposal::all();
        $data = KwtVerifikasi::orderBy('id','desc')->get();
        return view('konsumsi.bantuan.verifikasi.index', compact('data','edit','proposal'));
    }
    
    public function storeVerifikasi(Request $request)
    {
        $data = new KwtVerifikasi([
            'latar_belakang'    => $request->latar_belakang,
            'landasan_hukum'    => $request->landasan_hukum,
            'maksud'            => $request->maksud,
            'kegiatan'          => $request->kegiatan,
            'hasil'             => $request->hasil,
            'kesimpulan'        => $request->kesimpulan,
            'saran'             => $request->saran,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id,
        ]);
        $data->save();

		return back()->with('success','Upload Verifikasi CP/CL successfully');
    }
    
    public function updateVerifikasi(Request $request, $id)
	{
	    $data = KwtVerifikasi::findOrFail($id);
	    $data->update([
            'latar_belakang'    => $request->latar_belakang,
            'landasan_hukum'    => $request->landasan_hukum,
            'maksud'            => $request->maksud,
            'kegiatan'          => $request->kegiatan,
            'hasil'             => $request->hasil,
            'kesimpulan'        => $request->kesimpulan,
            'saran'             => $request->saran
        ]);

		return back()->with('success','Update Verifikasi CP/CL successfully');
	}
	
	public function destroyVerifikasi($id)
    {
		KwtVerifikasi::find($id)->delete();

		return back()->with('success','Delete Verifikasi CP/CL successfully');
    }
    
    public function pdfVerifikasi($id)
    {
        $verifikasi = KwtVerifikasi::findOrFail($id);
        return view('konsumsi.bantuan.verifikasi.pdf', compact('verifikasi'));
    }
    
    
    // SK
    public function indexSk()
    {
        $edit = 1;
        $data = KwtSk::all();
        return view('konsumsi.bantuan.sk.index', compact('data','edit'));
    }
    
    public function storeSk(Request $request)
    {
        if ($request->hasFile('file')) {
			$file = $request->file('file');
			$imageName = time().'_'.$file->getClientOriginalName();
			$file->move(\public_path('konsumsi/bantuan/sk'),$imageName);

			$data = new KwtSk([
				'keterangan'	=> $request->keterangan,
				'tanggal'	    => $request->tanggal,
				'file'			=> $imageName
			]);

			$data->save();
		}

		return back()->with('success','Upload SK Penerima Manfaat successfully');
    }
    
    public function updateSk(Request $request, $id)
	{
	    $data = KwtSk::findOrFail($id);
             if($request->hasFile("file")){
                 if (File::exists("konsumsi/bantuan/sk/".$data->file)) {
                     File::delete("konsumsi/bantuan/sk/".$data->file);
                 }
                 $file=$request->file("file");
                 $data->file=time()."_".$file->getClientOriginalName();
                 $file->move(\public_path("konsumsi/bantuan/sk"),$data->file);
                 $request['file']=$data->file;
             }

        $data->update([
			'keterangan'	    => $request->keterangan,
			'tanggal'	        => $request->tanggal,
			'file'			    => $data->file
        ]);

        return back()->with('success', 'Edit SK Penerima Manfaat successfully.');
	}
	
	public function destroySk($id)
    {
        $data = KwtSk::findOrFail($id);
		if (File::exists('konsumsi/bantuan/sk/'.$data->file)) {
			File::delete('konsumsi/bantuan/sk/'.$data->file);
		}

		KwtSk::find($id)->delete();

		return back()->with('success','Delete SK Penerima Manfaat successfully');
    }
    
    public function indexBerita()
    {
        $edit = 1;
        $verifikasi = KwtVerifikasi::all();
        $data = KwtBerita::orderBy('tanggal','desc')->get();
        return view('konsumsi.bantuan.berita-acara.index',compact('data','verifikasi','edit'));
    }
    
    public function storeBerita(Request $request)
    {
        $data = new KwtBerita([
            'pendahuluan'       => $request->pendahuluan,
            'kesimpulan'        => $request->kesimpulan,
            'tanggal'           => $request->tanggal,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
        ]);
        $data->save();
        return back()->with('success','Create Berita Acara successfully');
    }
    
    public function showBerita($id)
    {
        $edit = 1;
        $data = KwtBerita::findOrFail($id);
        return view('konsumsi.bantuan.berita-acara.show',compact('data','edit'));
    }
    
    public function pdfBerita($id)
    {
        $data = KwtBerita::findOrFail($id);
        return view('konsumsi.bantuan.berita-acara.pdf',compact('data'));
    }
    
    public function updateBerita(Request $request, $id)
    {
        $data = KwtBerita::findOrFail($id);
        $data->update([
            'pendahuluan'       => $request->pendahuluan,
            'kesimpulan'        => $request->kesimpulan,
            'tanggal'           => $request->tanggal,
            'kwt_kelompok_id'   => $request->kwt_kelompok_id
        ]);
        return back()->with('success','Update Berita Acara successfully');
    }
    
    public function destroyBerita($id)
    {
        KwtBerita::find($id)->delete();
        return back()->with('success','Delete Berita Acara successfully');
    }
    
    
    public function storeBeritaBantuan(Request $request)
    {
        $data = new KwtBeritaBantuan([
            'jenis_barang'  => $request->jenis_barang,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'keterangan'    => $request->keterangan,
            'kwt_berita_id' => $request->kwt_berita_id
        ]);
        $data->save();
        return back()->with('success','Create Bantuan Kelompok Tani successfully');
    }
    
    public function updateBeritaBantuan(Request $request,$id)
    {
        $data = KwtBeritaBantuan::findOrFail($id);
        $data->update([
            'jenis_barang'  => $request->jenis_barang,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'keterangan'    => $request->keterangan
        ]);
        return back()->with('success','Update Bantuan Kelompok Tani successfully');
    }
    
    public function destroyBeritaBantuan($id)
    {
        KwtBeritaBantuan::find($id)->delete();
        return back()->with('success','Delete Bantuan Kelompok Tani successfully');
    }
    
    
    
    public function indexMonev()
    {
        $data = KwtBerita::orderBy('tanggal','desc')->get();
        return view('konsumsi.bantuan.monev.index',compact('data'));
    }
    
    public function excelMonev()
    {
        return Excel::download(new KwtMonevExport, 'kwt-monev.xlsx');
    }
    
    
    
    
    
}