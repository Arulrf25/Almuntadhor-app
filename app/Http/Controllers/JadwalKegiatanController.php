<?php

namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JadwalKegiatanController extends Controller
{
    public function index()
    {
        $jadwal = JadwalKegiatan::orderBy('created_at', 'asc')->paginate(5);
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

    public function jadwalKegiatan()
    {
        $ahad = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'ahad')->get();
        $senin = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'senin')->get();
        $selasa = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'selasa')->get();
        $rabu = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'rabu')->get();
        $kamis = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'kamis')->get();
        $jumat = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'jumat')->get();
        $sabtu = JadwalKegiatan::orderBy('waktu', 'asc')->where('hari', 'sabtu')->get();
        return view('users.jadwal', ['ahad' => $ahad, 'senin' => $senin, 'selasa' => $selasa, 'rabu' => $rabu, 'kamis' => $kamis, 'jumat' => $jumat, 'sabtu' => $sabtu]);
    }

}
