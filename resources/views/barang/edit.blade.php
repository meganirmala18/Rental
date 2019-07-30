@extends('layout.app')

@section('content')
<form method="post" action="{{route('barang.update',['id'=>$barang->id])}}">
	{{ csrf_field() }}
	{{ method_field('PUT')}}

	<div class="form-grup row">
		<label >Nama Barang</label>
	</div>

	<input type="hidden" name="_method" value="PUT">
	
	<input class="form-control" type="text" name="nama_barang" value="{{ $barang->nama_barang }}">
	<br>

	<div class="form-grup row">
		<label >Qty</label>
	</div>
	<input class="form-control" type="text" name="qty" value="{{ $barang->qty }}">
	<br>
	<button class="btn btn-primary" type="submit">Simpan</button>

	<button class="btn btn-danger">Batal</button>
</form>
@endsection