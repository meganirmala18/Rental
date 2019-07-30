@extends('layouts.master')
@section('content')
<form method="post" action="{{route('karyawan.update',['id'=>$karyawan->id])}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT')}}
	<input type="hidden" name="_method" value="PUT">
	<form method="post" action="{{route("karyawan.store")}}" enctype="multipart/form-data" class="forms-sample">
		{{ csrf_field() }}
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Input Data Karyawaan</h4>
								<form class="forms-sample" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputName1">Nama Karyawaan</label>
										<input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}">
									</div>
									<div class="form-group">
										<label for="exampleInputmakanan3">Pilih Jenis Kelamin</label><select class="form-control" name="jenis_kelamin">
											<option value="Laki-Laki"@if($karyawan->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
											<option value="Perempuan"@if($karyawan->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
										</select>   
									</div>
									<div class="form-group">
										<label for="exampleInputName1">Alamat</label>
										<textarea class="form-control" name="alamat">{{$karyawan->alamat}}</textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputName1">No Telepon</label>
										<input type="text" class="form-control" id="exampleInputName1" placeholder="No Telepon" name="no_tlp"value="{{ $karyawan->no_tlp }}">
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-form-label">Upload gambar</label>
										<div class="col-sm-3 fileUpload btn btn-info">
											<span>Upload </span>
											<input name="file" class="upload" type="file">
										</div>
									</div>                     
									<button class="btn btn-primary" type="submit">Simpan</button>
									<button class=" btn btn-danger " type="button" onclick="history.back();" value="Back">Batal</button>
								</form>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	//
	@endsection