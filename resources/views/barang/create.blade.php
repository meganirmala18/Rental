@extends('layout.app')

@section('content')
<form method="post" action="{{route('barang.store')}}">
	{{ csrf_field() }}
	<label>Nama Barang</label>
	<input class="form-control" type="text" name="nama_barang">
	<hr>
	<label>Qty</label>
	<input class="form-control" type="text" name="qty">
	<hr>
	<button class="btn btn-primary" type="submit">Simpan</button>
	<button class=" btn btn-danger " type="button" onclick="history.back();" value="Back">Batal</button>
</form>
@endsection