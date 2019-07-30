<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pelanggan;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {            
            $data = Pelanggan::where('merk','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data = Pelanggan::all();
        } 
        return view("pelanggan.index",['data'=>$data]);                   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pelanggan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new \App\Model\Pelanggan;  
        $data=Pelanggan::create($request->all());      
        if ($request->hasFile('file')) {
            $request->file('file')->move('imgpelanggan/',$request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }     
        return redirect()->route("pelanggan.index")->with('Sukses','Data Berhasil Disimpan');
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
        $pelanggan= Pelanggan::where('id' ,$id)->first();
        return view("pelanggan.edit", compact('pelanggan'));
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
        $data = \App\Model\Pelanggan::find($id);
        $data->update($request->all());    
        if ($request->hasFile('file')) {
            $request->file('file')->move('imgpelanggan/',$request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }     
        return redirect()->route("pelanggan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route("pelanggan.index");
    }
}
