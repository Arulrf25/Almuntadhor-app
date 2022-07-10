<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function tagihan()
    {   
        $username = Auth::user()->username;
        $pembayaran = Pembayaran::where('nis', $username)->get();
        $waktu = Carbon::now();
        $tahun =  Carbon::now()->year;
        $tagihan = Tagihan::where('status', 'aktif')->where('nis', $username)->where('tahun', Carbon::now()->year)->where('bulan', $waktu->isoFormat('MMMM'))->get();
        $tagihan2 = Tagihan::where('status', 'aktif')->where('nis', $username)->paginate(5);
      
    return view('users.tagihan', 
    [
        'dataTagihan' => $tagihan, 
        'dataTagihan2' => $tagihan2, 
        'waktu'=>$waktu, 
        'tahun'=>$tahun,
        'data_bayar' => $pembayaran,
    ]);
    }

    public function waiting($id)
    {   
        $username = Auth::user()->username;
        $pembayaran = Pembayaran::where('nis', $username)->where('order_id', $id)->get();

    return view('users.waiting_payment', 
    [
        'data_bayar' => $pembayaran,
    ]);
    }

    public function detail(Request $request){
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $no_hp = Auth::user()->no_hp;
        $waktu = Carbon::now();
        $tagihan = Tagihan::where('status', 'aktif')->where('nis', $username)->where('tagihan', $request->tagihan)->get();
          // Set your Merchant Server Key
       \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
       // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
       \Midtrans\Config::$isProduction = false;
       // Set sanitization on (default)
       \Midtrans\Config::$isSanitized = true;
       // Set 3DS transaction for credit card to true
       \Midtrans\Config::$is3ds = true;
       
       $params = array(
           'transaction_details' => array(
               'order_id' => rand(),
               'gross_amount' => 10000,
           ),
           'item_details' => array(
                [
                'id' =>'1',
                'price' =>  $request->nominal,
                'quantity' => '1',
                'name' => $request->tagihan . ' '.$request->bulan . ' ' .$request->tahun,
                ],
                [
                
                'id' =>'2',
                'price' =>  '5500',
                'quantity' => '1',
                'name' => 'Biaya Admin',

                ]
            ),
           'customer_details' => array(
               'first_name' => $username .' | ',
               'last_name' => $name,
           ),
       );
       
       $snapToken = \Midtrans\Snap::getSnapToken($params);
    return view('users.payment', 
    [
        'dataTagihan' => $tagihan, 
        'waktu'=>$waktu, 
        'snap_token' => $snapToken
    ]);
    }

    public function payment(Request $request){
        // return $request;
        $username = Auth::user()->username;
        $json = json_decode($request->get('json'));
        DB::table('tagihans')->where('id',$request->id)->update([
            'keterangan' => $json->transaction_status,
            'order_id' => $json->order_id
        ]);

        $data_bayar = new Pembayaran();
        $data_bayar->nis = $username;
        $data_bayar->tagihan = $request->tagihan;
        $data_bayar->bulan = $request->bulan;
        $data_bayar->tahun = $request->tahun;
        $data_bayar->status = $json->transaction_status;
        $data_bayar->transaction_id = $json->transaction_id;
        $data_bayar->order_id = $json->order_id;
        $data_bayar->gross_amount = $json->gross_amount;
        $data_bayar->payment_type = $json->payment_type;
        $data_bayar->bank = isset($json->va_numbers[0]->bank) ? $json->va_numbers[0]->bank : null ;
        $data_bayar->payment_code = isset($json->payment_code) ? $json->payment_code : null ;
        $data_bayar->kode_bank = isset($json->biller_code) ? $json->biller_code : null ;
        $data_bayar->bill_key = isset($json->bill_key) ? $json->bill_key : null ;

        $data_bayar->va_number = isset($json->va_numbers[0]->va_number) ? $json->va_numbers[0]->va_number : null ;
        $data_bayar->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $data_bayar->save();

        return redirect('/tagihan')->with('payment-success', 'Pembayaran Berhasil Diproses');
    }
}
