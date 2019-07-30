<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Penyewaan;
use App\Model\Pelanggan;
use App\Model\Kendaraan;

class penyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {                
            $data = Penyewaan::where('pelanggan_id','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data = Penyewaan::all();
        } 
        return view("penyewaan.index",['data'=>$data]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pelanggan $post)
    {
        $pelanggan = Pelanggan::all();
       return view("penyewaan.create", compact('post','pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Penyewaan::create([
        'pelanggan_id' =>$request->pelanggan_id

    ]);
     return redirect()->route("penyewaan.show",['id'=>$data->id]);
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penyewaan::findOrFail($id);
        $kendaraan = kendaraan::all();
        return view('penyewaan.show')->with('kendaraan',$kendaraan)->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Pelanggan $post)
    {
        $pelanggan = Pelanggan::all();
        $penyewaan= Penyewaan::where('id' ,$id)->first();
        return view("penyewaan.edit", compact('penyewaan','post','pelanggan'));               
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
        Penyewaan::where('id' ,$id)->update([
            'pelanggan_id'=>$request->pelanggan_id        
        ]);
        return redirect()->route("penyewaan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penyewaan::destroy($id);
        return redirect()->route("penyewaan.index");
    }
}
