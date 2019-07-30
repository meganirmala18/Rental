@extends('layouts.master')
@section('content')
<form method="post" action="{{route('penyewaan.store')}}">
	{{ csrf_field() }}
	<div class="form-group">
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Input Data Penyewaan</h4>
								<form class="forms-sample" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputName1">Nama Pelanggan</label>
										<select name="pelanggan_id" class="form-control">
											<option>Pilih</option>
											@foreach($pelanggan as $v)
											<option 
											value=" {{ $v->id }} "
											@if ($v->id == $post->pelanggan_id)
											selected
											@endif
											>
											{{ $v->nama_pelanggan }}				
										</option>
										@endforeach
									</select>
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
@endsection