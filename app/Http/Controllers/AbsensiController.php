<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
   
    public function index()
    {
        return view ('Absensi.Masuk');
    }
    public function keluar()
    {
        return view ('Absensi.Keluar');
    }

    
    public function halamanrekap()
    {
      return view('Absensi.Halaman-rekap-pegawai');
    }
    public function tampildatakeseluruhan($tglawal, $tglakhir)
    {
      $absensi = Absensi:: with('user')->whereBetween('tgl',[$tglawal, $tglakhir])->orderBy('tgl','asc')->get();
      return view('Absensi.Rekap-pegawai',compact('absensi'));
    }
  
    public function store(Request $request)
    {
       $timezone ='Asia/Jakarta';
       $date = new DateTime('now', new DateTimeZone($timezone));
       $tanggal = $date->format('Y-m-d');
       $localtime = $date->format('H:i:s');

       $absensi = Absensi::where([
        ['user_id','=',auth()->user()->id],
        ['tgl','=',$tanggal],
       ])->first();
       if ($absensi){
        // dd("sudah ada");
        return redirect('absensi-masuk')->with('toast_success', 'Data sudah ada');
        
       }
       
       else{
        Absensi::create([
            'user_id' => auth()->user()->id,
            'tgl' => $tanggal,
            'jammasuk' =>$localtime,
        ]);
       }
       return redirect('absensi-masuk');
    }

   

    public function absensipulang()
    {
       $timezone ='Asia/Jakarta';
       $date = new DateTime('now', new DateTimeZone($timezone));
       $tanggal = $date->format('Y-m-d');
       $localtime = $date->format('H:i:s');

       $absensi = Absensi::where([
        ['user_id','=',auth()->user()->id],
        ['tgl','=',$tanggal],
       ])->first();

       $dt=[
        'jamkeluar' =>$localtime,
        'jamkerja' => date('H:i:s', strtotime($localtime)- strtotime($absensi->jammasuk)
        )];
       if ($absensi->jamkeluar == ""){
        $absensi->update($dt);
        return redirect('absensi-masuk');
       }else{
        dd("sudah ada");
       }
      
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
