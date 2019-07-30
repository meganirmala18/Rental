@extends('layouts.master')
@section('content')
<form method="post" action="{{route('kendaraan.update',['id'=>$kendaraan->id])}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT')}}
	<input type="hidden" name="_method" value="PUT">
<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Input Data Kendaraan</h4>
							<form class="forms-sample" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Jenis Kendaraan</label>
									<select name="jenis_kendaraan_id" class="form-control">
										<option>Pilih</option>
										@foreach($jenis_kendaraan as $v)
										<option 
										value=" {{ $v->id }} "
										@if ($v->id == $post->jenis_kendaraan_id)
										selected
										@endif
										>
										{{ $v->jenis }}				
									</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputName1">Plat</label>
								<input type="text" class="form-control" id="exampleInputName1" placeholder="plat" name="plat" value="{{ $kendaraan->plat }}">
							</div>
							<div class="form-group">
								<label for="exampleInputName1">Merk</label>
								<input type="text" class="form-control" id="exampleInputName1" placeholder="Merk Kendaraan" name="merk" value="{{ $kendaraan->merk }}">
							</div>
							<div class="form-group">
								<label for="exampleInputName1">Harga Sewa/Hari</label>
								<input type="text" class="form-control" id="exampleInputName1" placeholder="Harga Sewa Kendaraan" name="hargasewa" value="{{ $kendaraan->hargasewa }}">
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
//
</form>
@endsection