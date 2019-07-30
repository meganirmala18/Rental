@extends('layouts.master')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Detail Penyewaan</h2>
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Kendaraan</button>
        </div>
    </div>
</div>

<hr>
<div class="container">
    <h5>Nama Pelanggan : {{$data->pelanggan->nama_pelanggan}}</h5>
</div>
<div class="container">
    <table class="table table-hover table-striped table-bordered">
        <thead style=" background-color: gray; color: white">
            <tr align="center">
                <td>merk</td>
                <td>Plat</td>
                <td>Lama Sewa</td>
            </tr>
        </thead>
        @php
        $total=0;
        @endphp
        @foreach($data->penyewaan_detail as $pen)
        <tr align="center">
            <td>{{ $pen->Kendaraan->merk}}</td>
            <td>{{ $pen->Kendaraan->plat}}</td>
            <td>{{ $pen->lamasewa}} hari</td>
        </tr>
        @php
        $total += $pen->kendaraan->hargasewa * $pen->lamasewa;
        @endphp
        @endforeach
    </table>

    <h5>
        <strong>
            Total Harga : Rp. {{ $total }}
        </strong>
    </h5>
</div>


<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Detail</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('penyewaan_detail.store')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="penyewaan_id" value="{{$data->id}}">
                    <div class="form-group">
                        <label>Merk</label>
                        <select name="kendaraan_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach($kendaraan as $b)
                            <option value="{{$b->id}}">{{$b->merk}}- Rp.{{$b->hargasewa}}                            
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lama Sewa</label>
                        <input type="number" name="lamasewa" class="form-control">
                    </div>
                    <button type="submit" name="submit">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal 
                </button>             
            </div>
        </div> 
    </div>
</div>
<div class="container">
    <a class="btn btn-danger float-right" href="{{route("penyewaan.index")}}">Back</a>
</div>

@endsection