@extends('layouts.master')
@section('content')
<div class="container">
	<h2 align="center">Data Karyawan</h2><hr>
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 navbar-search" method="GET" action="/karyawan">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" class="float-right" name="cari">		
				<button class="btn btn-primary " type="submit">
					<i class="fas fa-search fa-sm"></i>
				</button>		
		</div>
	</form>
	<a class="btn btn-primary float-right" href="{{route("karyawan.create")}}">Tambah</a>
</div>
<hr>
<table class="table table-bordered">
	<tr align="center">
		<td>Id</td>
		<td>Nama Karyawan</td>
		<td>Foto</td>
		<td>Jenis Kelamin</td>
		<td>Alamat</td>
		<td>No Tlp</td>
		<td>Aksi</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td align="center">{{ $v->id}}</td>
		<td>{{ $v->nama_karyawan}}</td>
		<td><img src="{{ url('images/'.$v->file) }}" style="width: 150px; height: 150px;"> </td>              
		<td>{{ $v->jenis_kelamin}}</td>
		<td>{{ $v->alamat}}</td>
		<td>{{ $v->no_tlp}}</td>		
		<td align="center">			
			<form action="{{route('karyawan.destroy', ['id'=>$v->id])}}" method="post">
				<a class="btn btn-info" href="{{route('karyawan.edit', ['id'=>$v->id])}}">Ubah</a> | 
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