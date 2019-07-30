<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kendaraan;
use App\Model\Jenis_Kendaraan;

class kendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->has('cari')) {            
        $data = Kendaraan::where('merk','LIKE','%'.$request->cari.'%')->get();
    }else{
        $data = Kendaraan::all();
    }        
    return view("kendaraan.index",['data'=>$data]);            
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jenis_Kendaraan $post)
    {
     $jenis_kendaraan = Jenis_Kendaraan::all();
     return view("kendaraan.create", compact('post','jenis_kendaraan'));
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\Model\Kendaraan;  
        $data=Kendaraan::create($request->all());      
        if ($request->hasFile('file')) {
            $request->file('file')->move('imgkendaraan/',$request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }     
        return redirect()->route("kendaraan.index")->with('sukses','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, jenis_kendaraan $post)
    {
        $jenis_kendaraan = Jenis_Kendaraan::all();
        $kendaraan= Kendaraan::where('id' ,$id)->first();
        return view("kendaraan.edit", compact('kendaraan','post','jenis_kendaraan'));               
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
     $data = \App\Model\Kendaraan::find($id);
     $data->update($request->all());
     if ($request->hasFile('file')) {
        $request->file('file')->move('imgkendaraan/',$request->file('file')->getClientOriginalName());
        $data->file = $request->file('file')->getClientOriginalName();
        $data->save();
    }
    return redirect()->route("kendaraan.index")->with('sukses','Data Berhasil Diubah');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kendaraan::destroy($id);
        return redirect()->route("kendaraan.index");
    }
}
