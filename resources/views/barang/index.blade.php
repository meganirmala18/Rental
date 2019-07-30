@extends('layout.app')


@section('content')
<table class="table table-bordered">
	<tr>
		<td>Id Barang</td>
		<td>Nama Barang</td>
		<td>Qty</td>
		<td>Aksi</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{ $v->id}}</td>
		<td>{{ $v->nama_barang}}</td>
		<td>{{ $v->qty }}</td>
		<td>			
			<form action="{{route('barang.destroy', ['id'=>$v->id])}}" method="post">
				<a class="btn btn-info" href="{{route('barang.edit', ['id'=>$v->id])}}">Ubah</a> | 
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
<a class="btn btn-primary" href="{{route('barang.create')}}">Tambah</a>
@endsection