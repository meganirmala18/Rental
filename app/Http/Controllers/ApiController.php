<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Penyewaan;
use App\Model\Pelanggan;
use App\Model\Kendaraan;
use App\Model\Jenis_Kendaraan;
class ApiController extends Controller
{
	//pelanggan
    public function getPelanggan(){
		$data = Pelanggan::get();
		return $data;
	}
	public function getPelanggann($id){
		$data= Pelanggan::where('id',$id)->first();
		return $data;
	}
	public function postPelanggan(Request $request){
		$save = Pelanggan::create($request->all());
		if ($save) {
			$res = array(
				'status' => true,
				'message' => 'produk berhasil di simpan');
		}else{
			$res= array(
				'status' => false,
				'message' => 'gagal menyimpan');
		}
		return response()->json($res);
	}
//-------------------------------------------------------------------------------
	//Jenis_Kendaraan
	public function getJenis(){
		$data = Jenis_Kendaraan::get();
		return $data;
	}
	public function getJeniss($id){
		$data= Jenis_Kendaraan::where('id',$id)->first();
		return $data;
	}
	public function postJenis(Request $request){
		$save = Jenis_Kendaraan::create($request->all());
		if ($save) {
			$res = array(
				'status' => true,
				'message' => 'produk berhasil di simpan');
		}else{
			$res= array(
				'status' => false,
				'message' => 'gagal menyimpan');
		}
		return response()->json($res);
	}
	public function UpdateJenis($id, Request $request){
		$save = Jenis_Kendaraan::where('id', $id)->update($request->all());
		if ($save) {
			$res = array(
				'status' => true,
				'message' => 'produk berhasil di ubah');
		}else{
			$res= array(
				'status' => false,
				'message' => 'gagal menyimpan');
		}
		return response()->json($res);
	}
	//----------------------------------------------------------------------------
	//Kendaraan
	public function getKendaraanMotor(){
		$data = Kendaraan::with('jenis_kendaraan')->where('jenis_kendaraan_id',1)->get();
		return $data;
	}
	public function getKendaraanMobil(){
		$data = Kendaraan::with('jenis_kendaraan')->where('jenis_kendaraan_id',2 )->get();
		return $data;
	}
	public function getKendaraann($id){
		$data= Kendaraan::where('id',$id)->with('jenis_kendaraan')->first();
		return $data;
	}
//---------------------------------------------------------------------------------
//Penyewaan
	public function getPenyewaan(){
		$data = Penyewaan::with('jenis_kendaraan')->get();
		return $data;
	}
	public function getPenyewaann($id){
		$data= Penyewaan::where('id',$id)->with('jenis_kendaraan')->first();
		return $data;
	}
	public function postPenyewaan(Request $request){
		$save = Penyewaan::create($request->all());
		if ($save) {
			$res = array(
				'status' => true,
				'message' => 'produk berhasil di simpan');
		}else{
			$res= array(
				'status' => false,
				'message' => 'gagal menyimpan');
		}
		return response()->json($res);
	}
	public function updatePenyewaan($id, Request $request){
		$save = Penyewaan::where('id', $id)->update($request->all());
		if ($save) {
			$res = array(
				'status' => true,
				'message' => 'produk berhasil di ubah');
		}else{
			$res= array(
				'status' => false,
				'message' => 'gagal menyimpan');
		}
		return response()->json($res);
	}
	
	
}
