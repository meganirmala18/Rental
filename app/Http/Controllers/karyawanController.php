<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Karyawan;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {            
            $data = Karyawan::where('nama_karyawan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data = Karyawan::all();
        }        
        return view("karyawan.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("karyawan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\Model\Karyawan;  
        $data=Karyawan::create($request->all());      
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/',$request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }     
        return redirect()->route("karyawan.index")->with('Sukses','Data Berhasil Disimpan');
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
    public function edit($id)
    {
        $karyawan= Karyawan::where('id' ,$id)->first();
        return view("karyawan.edit", compact('karyawan'));
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
        $data = \App\Model\Karyawan::find($id);
        $data->update($request->all());
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/',$request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route("karyawan.index")->with('Sukses','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect()->route("karyawan.index");
    }
}
