<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalKegiatanController extends Controller
{
    public function index()
    {
        $jadwal = JadwalKegiatan::orderBy('hari', 'asc')->paginate(5);
        return view('admin.v_jadwal', [
            'events' => $jadwal, 'title' => 'Jadwal Kegiatan'
        ]);
    }

    public function create(Request $request)
    {
        \App\Models\JadwalKegiatan::create($request->all);
    }

    public function store(Request $request)
    {
        $jadwalKegiatan = $request->all();
        //  Array 1 dimensi
        $id = DB::select("SHOW TABLE STATUS LIKE 'jadwal_kegiatan'");
        $next_id = $id[0]->Auto_increment;
        if ($next_id >= 10) {
            $jadwalKegiatan['id'] = '0' . $next_id;
            JadwalKegiatan::create($jadwalKegiatan);
        } else {
            $jadwalKegiatan['id'] = '00' . $next_id;
            JadwalKegiatan::create($jadwalKegiatan);
        }
        return redirect()->route('data-kegiatan');
    }

    public function show()
    {
        $jadwal_kegiatan = JadwalKegiatan::where('hari', 'senin')->orderBy('waktu', 'asc')->get();
        return view('users.jadwal', [
            'tampilJadwal' => $jadwal_kegiatan
        ]);
    }

    public function edit($id)
    {
        $edit_jadwal = JadwalKegiatan::findOrFail($id);
        return view('admin.edit_jadwal')->with([
            'events' => $edit_jadwal, 'title' => 'Ubah Jadwal'
        ]);
    }

    public function update(Request $request, $id)
    {
        $update_jadwal = $request->all();
        $jadwal_santri = JadwalKegiatan::findOrFail($id);
        $jadwal_santri->update($update_jadwal);
        return redirect('data-kegiatan');
    }

    public function destroy($id)
    {
        $hapus_jadwal = JadwalKegiatan::findOrFail($id);
        $hapus_jadwal->delete();
        return redirect()->route('data-kegiatan');
    }

    public function tampilSelasa()
    {
        $jadwal_kegiatan = JadwalKegiatan::where('hari', 'selasa')->orderBy('waktu', 'asc')->get();
        return view('users.jadwal', [
            'tampilSelasa' => $jadwal_kegiatan
        ]);
    }

    // public function rabu()
    // {
    //     $jadwal_kegiatan = JadwalKegiatan::where('hari', 'rabu')->orderBy('waktu', 'asc')->get();
    //     return view('users.jadwal', [
    //         'rabu' => $jadwal_kegiatan
    //     ]);
    // }

    // public function kamis()
    // {
    //     $jadwal_kegiatan = JadwalKegiatan::where('hari', 'kamis')->orderBy('waktu', 'asc')->get();
    //     return view('users.jadwal', [
    //         'kamis' => $jadwal_kegiatan
    //     ]);
    // }

    // public function jumat()
    // {
    //     $jadwal_kegiatan = JadwalKegiatan::where('hari', 'jumat')->orderBy('waktu', 'asc')->get();
    //     return view('users.jadwal', [
    //         'jumat' => $jadwal_kegiatan
    //     ]);
    // }

    // public function sabtu()
    // {
    //     $jadwal_kegiatan = JadwalKegiatan::where('hari', 'sabtu')->orderBy('waktu', 'asc')->get();
    //     return view('users.jadwal', [
    //         'sabtu' => $jadwal_kegiatan
    //     ]);
    // }

    // public function ahad()
    // {
    //     $jadwal_kegiatan = JadwalKegiatan::where('hari', 'ahad')->orderBy('waktu', 'asc')->get();
    //     return view('users.jadwal', [
    //         'ahad' => $jadwal_kegiatan
    //     ]);
    // }
}
