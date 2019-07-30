<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\barang;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = barang::all();
      return view("barang.index", compact("data"));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("barang.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       barang::create([
        'nama_barang' =>$request->nama_barang,
        'qty' =>$request->qty
    ]);
       return redirect()->route("barang.index");
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $barang= barang::where('id' ,$id)->first();
       return view("barang.edit", compact('barang'));
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
        //
       barang::where('id' ,$id)->update([
        'nama_barang'=>$request->nama_barang,
        'qty'=>$request->qty,
    ]);
       return redirect()->route("barang.index");
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = barang::where('id_',$id)->first();
        barang::destroy($id);
        // $data->delete();
        // return redirect()->route('barang.index')->with('alert-success','Data Berhasil Di Hapus !');
        
        // barang::table('barang')->where('id_barang',$id)->delete();
        return redirect()->route("barang.index");
    }
}
