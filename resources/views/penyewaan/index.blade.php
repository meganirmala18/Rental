@extends('layouts.master')
@section('content')
<div class="container">
	<h2 align="center">Data Penyewaan</h2><hr>
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 navbar-search" method="GET" action="/penyewaan">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" class="float-right" name="cari">	
			<button class="btn btn-primary " type="submit">
				<i class="fas fa-search fa-sm"></i>
			</button>				
		</div>					
	</form>
	<a class="btn btn-primary float-right" href="{{route("penyewaan.create")}}">Tambah</a>
</div>

<hr>
<table class="table table-bordered">
	<tr align="center">
		<td>ID</td>
		<td>Nama Pelanggan</td>
		<td>Aksi</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td align="center">{{ $v->id}}</td>
		<td>( {{ $v->pelanggan_id}} ),{{ $v->pelanggan->nama_pelanggan}}</td>
		<td align="center">			
			<form action="{{route('penyewaan.destroy', ['id'=>$v->id])}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button class="btn btn-danger" type="button" onclick="if (confirm('Anda yakin ?')) this.form.submit();">
					Hapus
				</button> |
				<a class="btn btn-info" href="{{route('penyewaan.show', ['id'=>$v->id])}}">Detail</a>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection
