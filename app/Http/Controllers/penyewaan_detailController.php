<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Penyewaan;
use App\Model\Pelanggan;
use App\Model\Penyewaan_detail;
use App\Model\Kendaraan;

class penyewaan_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penyewaan_detail::all();
        return view("penyewaan.index", compact(quotemeta('data')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyewaan = Penyewaan::all();
        $kendaraan = Kendaraan::all();
        return view("penyewaan_detail.create", compact('post','penyewaan','kendaraan'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Penyewaan_detail::create([
            'penyewaan_id'=>$request->penyewaan_id,
            'kendaraan_id'=>$request->kendaraan_id,
            'lamasewa'=>$request->lamasewa
        ]);
        return redirect()->route('penyewaan.show', ['id' => $data->penyewaan_id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'show';
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
