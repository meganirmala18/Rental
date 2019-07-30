@extends('layouts.master')
@section('content')
<div class="container">
	<h2 align="center">Data Kendaraan</h2><hr>
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 navbar-search" method="GET" action="/kendaraan">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" class="float-right" name="cari">			
				<button class="btn btn-primary " type="submit">
					<i class="fas fa-search fa-sm"></i>
				</button>			
		</div>
	</form>
	<a class="btn btn-primary float-right" href="{{route("kendaraan.create")}}">Tambah</a>
</div>
<hr>
<table class="table table-bordered">
	<tr align="center">
		<td>ID</td>
		<td>Gambar Kendaraan</td>
		<td>Jenis Kendaraan</td>
		<td>Plat</td>
		<td>Merk</td>
		<td>Harga Sewa/Hari</td>
		<td>Aksi</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td align="center">{{ $v->id}}</td>
		<td><img src="{{ url('imgkendaraan/'.$v->file) }}" style="width: 150px; height: 150px;"> </td>
		<td>{{ $v->jenis_kendaraan->jenis}}</td>
		<td>{{ $v->plat}}</td>
		<td>{{ $v->merk}}</td>
		<td>{{ $v->hargasewa}}</td>
		<td align="center">			
			<form action="{{route('kendaraan.destroy', ['id'=>$v->id])}}" method="post">
				<a class="btn btn-info" href="{{route('kendaraan.edit', ['id'=>$v->id])}}">Ubah</a> | 
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button class="btn btn-danger" type="button" onclick="if (confirm('Anda yakin ?')) this.form.submit();">
					Hapus
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
@endsection
