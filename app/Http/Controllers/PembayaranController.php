<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Dompdf\Dompdf;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PembayaranController extends Controller
{
    public function index()
    {
        $data_pembayaran = Pembayaran::orderBy('created_at', 'asc')->get();
        return view('pengurus.v_pembayaran', [
            'colleges' => $data_pembayaran
        ]);
    }

    public function create(Request $request)
    {
        // Mengirim data dari modal tambah ke database
        \App\Models\Pembayaran::create($request->all);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nis'           => 'required',
        //     'nama'          => 'required',
        //     'tanggal'       => 'required',
        //     'nominal'       => 'required',
        //     'bukti'         => 'required|image|mimes:png,jpg,jpeg',
        //     'keterangan'    => 'required'
        // ]);
    
        // //upload image
        // $image = $request->file('bukti');
        // $image->storeAs('public/blogs', $image->hashName());
    
        // $bukti = Pembayaran::create([
        //     'nis'           => $request->nis,
        //     'nama'          => $request->nama,
        //     'tanggal'       => $request->tanggal,
        //     'nominal'       => $request->nominal,
        //     'bukti'         => $image->hashName(),
        //     'keterangan'    => $request->keterangan
        // ]);
    
        // if($bukti){
        //     //redirect dengan pesan sukses
        //     return redirect()->route('data-pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
        // }else{
        //     //redirect dengan pesan error
        //     return redirect()->route('data-pembayaran.index')->with(['error' => 'Data Gagal Disimpan!']);
        // }
    
        $input_data = $request->all();

        //  Array 1 dimensi
        $id = DB::select("SHOW TABLE STATUS LIKE 'data_tagihan'");
        $next_id = $id[0]->Auto_increment;
        // jika id terbaru lebih dari sama dengan 10 maka keluaranya 00 + id terbaru
        if ($next_id >= 10) {
            $input_data['id'] = '0' . $next_id;
            Pembayaran::create($input_data);
            // Session::flash('success', 'Data berhasil ditambahkan!');
        } else {
            // selain itu maka 0 + id terbaru
            // default value dari nomor karyawan adalah 0 + id terbaru
            $input_data['id'] = '00' . $next_id;
            // tambah data
            Pembayaran::create($input_data);
            // Session::flash('error', 'Data gagal ditambahkan!');
        }
        return redirect()->route('data-pembayaran.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data_pembayaran = Pembayaran::findOrFail($id);
        return view('pengurus.edit_pembayaran')->with([
            'colleges' => $data_pembayaran
        ]);
    }

    public function update(Request $request, $id)
    {
        $input_update = $request->all();
        $data_spesifik = Pembayaran::findOrFail($id);
        $data_spesifik->update($input_update);
        return redirect('data-pembayaran');
    }

    public function destroy($id)
    {
        $data_spesifik = Pembayaran::findOrFail($id);
        $image_path = public_path("img/{$data_spesifik->bukti}");
        File::delete($image_path);

        $data_spesifik->delete();
        return redirect()->route('data-pembayaran.index');
    }

    public function cetakForm()
    {
        return view('pengurus.cetak_form');
    }

    public function cetakPertanggal($tglawal, $tglakhir)
    {
        $cetakPertanggal = Pembayaran::orderBy('tanggal', 'asc')->whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view('pengurus.cetak_pertanggal', [
            'colleges' => $cetakPertanggal
        ]);
    }

    public function tampil()
    {
        $buktiPembayaran = Pembayaran::latest()->get();
        return view('users.upload_bukti', compact('buktiPembayaran'));
    }

    public function riwayat()
    {
        $santri = Auth::user()->username;
        $pembayaran = Pembayaran::where('nis', $santri)->where('status', 'settlement' )->get();
        $pembayaran1 = Pembayaran::where('nis', $santri)->where('status', 'capture' )->get();
        return view('users.riwayat_bayar', ['riwayatPembayaran' => $pembayaran, 'riwayatPembayaran1' => $pembayaran1]);
    }

    public function cetak($id)
    {
        $santri = Auth::user()->username;
        $tanggal = Carbon::now();
        $pembayaran = Pembayaran::where('nis', $santri)->where('order_id', $id )->get();

        // instantiate and use the dompdf class
        $html = view('users.kwitansi', ['riwayatPembayaran' => $pembayaran, 'tanggal'=>$tanggal, 'title'=>$id]);
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($html);

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A5', 'landscape');
        // $options = $dompdf->getOptions();
        // $options->setIsHtml5ParserEnabled(true);
        // $dompdf->setOptions($options);


        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();

        return $html;
    }

    public function detail($id)
    {
        $santri = Auth::user()->username;
        $detail = Pembayaran::findOrFail($id);
        return view('users.detail_riwayat', ['detail' => $detail]);
    }
  

    public function editTagihan($id)
    {
        $edit_tagihan = Pembayaran::findOrFail($id);
        return view('users.upload_bukti')->with([
            'dataTagihan' => $edit_tagihan
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $this->printData = Pembayaran::where('nama', 'like', '%' . $keyword . '%')->orderBy('nama', 'asc')->get();
        return view('pengurus.v_pembayaran')->with([
            'colleges' => $this->printData
        ]);
    }
}
