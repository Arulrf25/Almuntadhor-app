<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Svg\Tag\Rect;

class SantriController extends Controller
{
    public function santriPengurus()
    {
        $data_santri = User::where('level', 'santri')->orderBy('kelas', 'ASC')->paginate(5);
        return view('pengurus.v_santri', [
            'datas' => $data_santri
        ]);
    }
    
}
