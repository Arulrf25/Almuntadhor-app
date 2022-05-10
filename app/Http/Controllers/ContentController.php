<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::latest()->get();
        return view('pengurus.v_content', [
            'uploads' => $content
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \App\Models\Content::create($request->all);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = $request->gambar;
        $namaFile = time().rand(100,999).".".$upload->getClientOriginalExtension();

            $dataUpload = new Content;
            $dataUpload->content_id = $request->content_id;
            $dataUpload->judul = $request->judul;
            $dataUpload->kategori = $request->kategori;
            $dataUpload->gambar = $namaFile;
            $dataUpload->deskripsi = $request->deskripsi;

            $upload->move(public_path().'/content', $namaFile);
            $dataUpload->save();

        return redirect('data-content')->with('success', 'Upload content baru berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('pengurus.edit_content')->with([
            'uploads' => $content
        ]);
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
        $ubah = Content::findorfail($id);
        $awal = $ubah->gambar;

        $uploads = [
            'content_id' => $request['content_id'],
            'judul' => $request['judul'],
            'kategori' => $request['kategori'],
            'gambar' => $awal,
            'deskripsi' => $request['deskripsi'],
        ];

        $image = $request->gambar;
        $image->move(public_path().'/content', $awal);
        $ubah->update($uploads);
        
        return redirect('data-content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_spesifik = Content::findOrFail($id);
        $data_spesifik->delete();
        return redirect()->route('data-content.index');
    }

    public function tampilContent()
    {
        $uploadContent = Content::where('kategori')->get();
        return view('pages.gallery', ['gallerys' => $uploadContent]);
    }
}
