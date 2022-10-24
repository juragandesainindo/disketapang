<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\KendaraanImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\KendaraanExport;
use App\Http\Requests\KendaraanRequest;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $now = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 7));
        // dd($now);

        $kendaraan = Kendaraan::orderBy('id', 'desc')->paginate(9);
        return view('umum.kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umum.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KendaraanRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image'] = $imageName;
        }

        if ($request->hasFile('image_s_kiri')) {
            $file = $request->file('image_s_kiri');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image_s_kiri'] = $imageName;
        }
        if ($request->hasFile('image_s_kanan')) {
            $file = $request->file('image_s_kanan');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image_s_kanan'] = $imageName;
        }
        if ($request->hasFile('image_belakang')) {
            $file = $request->file('image_belakang');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image_belakang'] = $imageName;
        }
        if ($request->hasFile('image_dalam')) {
            $file = $request->file('image_dalam');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image_dalam'] = $imageName;
        }
        if ($request->hasFile('image_mesin')) {
            $file = $request->file('image_mesin');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan'), $imageName);
            $input['image_mesin'] = $imageName;
        }

        Kendaraan::create($input);

        Alert::success('Success', 'Create kendaraan has been successfully');

        return redirect()->route('kendaraans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edit = 1;
        $kendaraan = Kendaraan::findOrFail($id);
        if ($kendaraan->image > 0) {
            $depan = $kendaraan->image;
        } else {
            $depan = 'null';
        }
        if ($kendaraan->image_s_kanan > 0) {
            $kanan = $kendaraan->image_s_kanan;
        } else {
            $kanan = 'null';
        }
        if ($kendaraan->image_s_kiri > 0) {
            $kiri = $kendaraan->image_s_kiri;
        } else {
            $kiri = 'null';
        }
        if ($kendaraan->image_belakang > 0) {
            $belakang = $kendaraan->image_belakang;
        } else {
            $belakang = 'null';
        }
        if ($kendaraan->image_dalam > 0) {
            $dalam = $kendaraan->image_dalam;
        } else {
            $dalam = 'null';
        }
        if ($kendaraan->image_mesin > 0) {
            $mesin = $kendaraan->image_mesin;
        } else {
            $mesin = 'null';
        }
        // dd($kanan);
        return view('umum.kendaraan.show', compact('kendaraan', 'edit', 'depan', 'kanan', 'kiri', 'belakang', 'dalam', 'mesin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        if ($kendaraan->image > 0) {
            $depan = $kendaraan->image;
        } else {
            $depan = 'null';
        }
        if ($kendaraan->image_s_kanan > 0) {
            $kanan = $kendaraan->image_s_kanan;
        } else {
            $kanan = 'null';
        }
        if ($kendaraan->image_s_kiri > 0) {
            $kiri = $kendaraan->image_s_kiri;
        } else {
            $kiri = 'null';
        }
        if ($kendaraan->image_belakang > 0) {
            $belakang = $kendaraan->image_belakang;
        } else {
            $belakang = 'null';
        }
        if ($kendaraan->image_dalam > 0) {
            $dalam = $kendaraan->image_dalam;
        } else {
            $dalam = 'null';
        }
        if ($kendaraan->image_mesin > 0) {
            $mesin = $kendaraan->image_mesin;
        } else {
            $mesin = 'null';
        }
        return view('umum.kendaraan.edit', compact('kendaraan', 'depan', 'kanan', 'kiri', 'belakang', 'dalam', 'mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KendaraanRequest $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $input = $request->validated();

        if ($request->hasFile("image")) {
            if (File::exists("kendaraan/" . $kendaraan->image)) {
                File::delete("kendaraan/" . $kendaraan->image);
            }
            $file = $request->file("image");
            $kendaraan->image = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image);
            $request['image'] = $kendaraan->image;
        }
        if ($request->hasFile("image_s_kiri")) {
            if (File::exists("kendaraan/" . $kendaraan->image_s_kiri)) {
                File::delete("kendaraan/" . $kendaraan->image_s_kiri);
            }
            $file = $request->file("image_s_kiri");
            $kendaraan->image_s_kiri = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image_s_kiri);
            $request['image_s_kiri'] = $kendaraan->image_s_kiri;
        }
        if ($request->hasFile("image_s_kanan")) {
            if (File::exists("kendaraan/" . $kendaraan->image_s_kanan)) {
                File::delete("kendaraan/" . $kendaraan->image_s_kanan);
            }
            $file = $request->file("image_s_kanan");
            $kendaraan->image_s_kanan = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image_s_kanan);
            $request['image_s_kanan'] = $kendaraan->image_s_kanan;
        }
        if ($request->hasFile("image_belakang")) {
            if (File::exists("kendaraan/" . $kendaraan->image_belakang)) {
                File::delete("kendaraan/" . $kendaraan->image_belakang);
            }
            $file = $request->file("image_belakang");
            $kendaraan->image_belakang = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image_belakang);
            $request['image_belakang'] = $kendaraan->image_belakang;
        }
        if ($request->hasFile("image_dalam")) {
            if (File::exists("kendaraan/" . $kendaraan->image_dalam)) {
                File::delete("kendaraan/" . $kendaraan->image_dalam);
            }
            $file = $request->file("image_dalam");
            $kendaraan->image_dalam = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image_dalam);
            $request['image_dalam'] = $kendaraan->image_dalam;
        }
        if ($request->hasFile("image_mesin")) {
            if (File::exists("kendaraan/" . $kendaraan->image_mesin)) {
                File::delete("kendaraan/" . $kendaraan->image_mesin);
            }
            $file = $request->file("image_mesin");
            $kendaraan->image_mesin = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("kendaraan"), $kendaraan->image_mesin);
            $request['image_mesin'] = $kendaraan->image_mesin;
        }

        $input['image'] = $kendaraan->image;
        $input['image_s_kiri'] = $kendaraan->image_s_kiri;
        $input['image_s_kanan'] = $kendaraan->image_s_kanan;
        $input['image_belakang'] = $kendaraan->image_belakang;
        $input['image_dalam'] = $kendaraan->image_dalam;
        $input['image_mesin'] = $kendaraan->image_mesin;

        $kendaraan->update($input);

        Alert::success('Success', 'Update kendaraan has been successfully');

        return redirect()->route('kendaraans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        if (File::exists("kendaraan/" . $kendaraan->image)) {
            File::delete("kendaraan/" . $kendaraan->image);
        }

        if (File::exists("kendaraan/" . $kendaraan->image_s_kiri)) {
            File::delete("kendaraan/" . $kendaraan->image_s_kiri);
        }
        if (File::exists("kendaraan/" . $kendaraan->image_s_kanan)) {
            File::delete("kendaraan/" . $kendaraan->image_s_kanan);
        }
        if (File::exists("kendaraan/" . $kendaraan->image_belakang)) {
            File::delete("kendaraan/" . $kendaraan->image_belakang);
        }
        if (File::exists("kendaraan/" . $kendaraan->image_dalam)) {
            File::delete("kendaraan/" . $kendaraan->image_dalam);
        }
        if (File::exists("kendaraan/" . $kendaraan->image_mesin)) {
            File::delete("kendaraan/" . $kendaraan->image_mesin);
        }

        Kendaraan::find($id)->delete();

        Alert::error('Delete', 'Delete kendaraan has been successfully');

        return redirect()->route('kendaraans.index')->with('success', 'Delete kendaraan dinas successfully.');
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('image_kendaraan')) {
            $file = $request->file('image_kendaraan');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan/all'), $imageName);

            $data = new KendaraanImage([
                'title_image'   => $request->title_image,
                'image_kendaraan'   => $imageName,
                'kendaraan_id'      => $request->kendaraan_id
            ]);

            $data->save();
        }

        return back()->with('success', 'Create image kendaraan successfully');
    }

    public function updateImage(Request $request, $id)
    {
        $data = KendaraanImage::findOrFail($id);

        if ($request->hasFile('image_kendaraan')) {
            if (File::exists('kendaraan/all/' . $data->image_kendaraan)) {
                File::delete('kendaraan/all/' . $data->image_kendaraan);
            }

            $file = $request->file('image_kendaraan');
            $data->image_kendaraan = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('kendaraan/all'), $data->image_kendaraan);
            $request['kendaraan_image'] = $data->image_kendaraan;

            $data->update([
                'title_image'   => $request->title_image,
                'image_kendaraan'   => $data->image_kendaraan,
            ]);
        }

        return back()->with('success', 'Update image kendaraan successfully');
    }

    public function destroyImage($id)
    {
        $data = KendaraanImage::findOrFail($id);

        if (File::exists('kendaraan/all/' . $data->image_kendaraan)) {
            File::delete('kendaraan/all/' . $data->image_kendaraan);
        }

        KendaraanImage::find($id)->delete();

        return back()->with('success', 'Delete image kendaraan successfully');
    }

    public function export()
    {
        return Excel::download(new KendaraanExport(), 'kendaraan.xlsx');
    }
}