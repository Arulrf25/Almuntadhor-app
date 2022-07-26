<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function galeri()
    {   
        $santri = Auth::user()->username;
        $galeri = Konten::where('kategori', 'galeri')->paginate(5);
       
        return view('admin.v_galeri', [
            'galeri' => $galeri, 
            'title' => 'Data Konten',

        ]);
    }

    public function create(Request $request)
    {
        \App\Models\Konten::create($request->all);
    }

    public function store(Request $request)
    {
        $upload = $request->gambar;
        $namaFile = time().rand(100,999).".".$upload->getClientOriginalExtension();
        
           
            if ($upload == "") {
                $gambar = "null";
                $dataUpload = new Konten;
                $dataUpload->judul = $request->judul;
                $dataUpload->kategori = $request->kategori;
                $dataUpload->gambar = $gambar;
                $dataUpload->deskripsi = $request->deskripsi;
                $dataUpload->save();
            } else {
               $gambar = $namaFile;
               $dataUpload = new Konten;
                $dataUpload->judul = $request->judul;
                $dataUpload->kategori = $request->kategori;
                $dataUpload->gambar = $gambar;
                $dataUpload->deskripsi = $request->deskripsi;
                $upload->move(public_path().'/content', $namaFile);
                $dataUpload->save();
            }
            
          
           
            

        return redirect('data-galeri')->with('success', 'Upload galeri baru berhasil!');
    }


    public function edit($id)
    {
        $galeri = Konten::findOrFail($id);
        return view('admin.edit_galeri')->with([
            'galeri' => $galeri, 'title' => 'Ubah Galeri'
        ]);
    }

    public function update(Request $request,$id)
    {
        $image_lama = $request->old_image;
        $image_baru = $request->file('gambar');

        if($image_baru == '') {
            $gambar = $image_lama;
            $deskripsi = "Gambar Lama";
            $content = Konten::findOrFail($id);
            $content->update(array(
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'gambar' => $gambar,
                'deskripsi' => $request->deskripsi,
            ));
        } else {
            $new_image = rand() .'.'. $image_baru->getClientOriginalExtension();
            $gambar = $new_image;
            $image_baru->move(public_path('content'), $new_image); 
            $content = Konten::findOrFail($id);
            $content->update(array(
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'gambar' => $gambar,
                'deskripsi' => $request->deskripsi,
            ));
            File::delete('content/'.$request->old_image);
        }
        return redirect('data-galeri');
    }

    public function destroy($id)
    {
        $data_spesifik = Konten::findOrFail($id);
        $image_path = public_path("content/{$data_spesifik->gambar}");
        File::delete($image_path);

        $data_spesifik->delete();
        return redirect()->route('data-galeri.index');
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $this->printData = Konten::where('judul', 'like', '%' . $keyword . '%')->orderBy('judul', 'asc')->get();
        return view('admin_v_konten')->with([
            'uploads' => $this->printData
        ]);
    }
}
