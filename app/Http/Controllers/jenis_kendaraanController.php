<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jenis_Kendaraan;


class jenis_kendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->has('cari')) {            
        $data = Jenis_Kendaraan::where('jenis','LIKE','%'.$request->cari.'%')->get();
    }else{
        $data = Jenis_Kendaraan::all();
    }        
    return view("jenis_kendaraan.index",['data'=>$data]);        
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jenis_kendaraan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jenis_Kendaraan::create([
            'jenis' =>$request->jenis           

        ]);
        return redirect()->route("jenis_kendaraan.index");
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
        $jenis_kendaraan= Jenis_Kendaraan::where('id' ,$id)->first();
        return view("jenis_kendaraan.edit", compact('jenis_kendaraan'));
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
        Jenis_Kendaraan::where('id' ,$id)->update([
            'jenis'=>$request->jenis_kendaraan        
        ]);
        return redirect()->route("jenis_kendaraan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis_Kendaraan::destroy($id);
        return redirect()->route("jenis_kendaraan.index");
    }
}
