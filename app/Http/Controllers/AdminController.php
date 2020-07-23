<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;;
use App\departmen;
use Carbon\Carbon;


/**
 *
 */
class AdminController extends Controller
{

  function dashboard()
  {
    $hasil =  departmen::with('pegawai')->get();
    for ($i=0; $i < count($hasil); $i++) {
      $pas = 0;
      $telat = 0;
      $alpha = 0;
      for ($j=0; $j < count($hasil[$i]->pegawai); $j++) {
        $jam = $hasil[$i]->pegawai[$j] -> waktu_datang;
        $jamtlt = $hasil[$i]->pegawai[$j] -> waktu_pulang;
        $waktu = date("H:i",strtotime($jam));
        $waktutlt = date("H:i",strtotime($jamtlt));
        if ($waktu <= '08:00') {
          $pas++;
        }elseif ($waktu >= '08:01' && $waktutlt <= '17:00') {
          $telat++;
        }else{
          $alpha++;
        }
      }
      $hasil[$i]->pas =$pas;
      $hasil[$i]->telat =$telat;
      $hasil[$i]->alpha =$alpha;
    }

$posts = pegawai::orderBy('waktu_datang', 'DESC')->paginate(5);
$mbuh = pegawai::orderBy('waktu_pulang', 'DESC')->paginate(5);

    $data_pegawai = pegawai::all();
    $jumlah_pegawai = count($data_pegawai);

    $onTime = 0;
    $onTelat = 0;
    $onAlpha = 0;
    foreach ($data_pegawai as $key) {
      $jam = $key -> waktu_datang;
      $jamtlt = $key -> waktu_pulang;
      $waktu = date("H:i",strtotime($jam));
      $waktutlt = date("H:i",strtotime($jamtlt));
      if ($waktu <= '08:00') {
        $onTime = $onTime + 1;
      }elseif ($waktu >= '08:01' && $waktutlt <= '17:00') {
        $onTelat = $onTelat +1;
      }else{
        $onAlpha = $onAlpha +1;
      }
    }



    return view('admin.dashboard',['jumlah_pegawai' =>$jumlah_pegawai,
    'onTime' => $onTime,'onTelat' => $onTelat,'onAlpha' => $onAlpha,'hasil' => $hasil,
    'posts' => $posts,'mbuh' => $mbuh]);
  }

}
