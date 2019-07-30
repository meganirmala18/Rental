@extends('layouts.master')
@section('content')
<form method="post" action="{{route('jenis_kendaraan.update',['id'=>$jenis_kendaraan->id])}}">
	{{ csrf_field() }}
	{{ method_field('PUT')}}

	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				 <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Input Jenis Kendaraan</h4>
							<form class="forms-sample" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputName1">Jenis Kendaraan</label>
									<input type="text" class="form-control" id="exampleInputName1" placeholder="Jenis" name="jenis" value="{{ $jenis_kendaraan->jenis}}">
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