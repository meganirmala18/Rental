@extends('layouts.master')
@section('content')
<form method="post" action="{{route('pelanggan.update',['id'=>$pelanggan->id])}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT')}}
	<input type="hidden" name="_method" value="PUT">

	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Input Data Pelanggan</h4>
							<form class="forms-sample" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputName1">Nama Pelanggan</label>
									<input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="nama_pelanggan"value="{{ $pelanggan->nama_pelanggan }}">
								</div>
								<div class="form-group">
									<label for="exampleInputmakanan3">Pilih Jenis Kelamin</label><br>
									<div class="form-group">
										<select class="form-control" name="jenis_kelamin">
											<option value="L"@if($pelanggan->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
											<option value="P"@if($pelanggan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
										</select> 
									</div>  
								</div>
								<div class="form-group">
									<label for="exampleInputName1">Alamat</label>
									<textarea class="form-control" name="alamat">{{$pelanggan->alamat}}</textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputName1">No Telepon</label>
									<input type="text" class="form-control" id="exampleInputName1" placeholder="No Telepon" name="no_tlp" value="{{ $pelanggan->no_tlp }}">
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
	</form>
	@endsection