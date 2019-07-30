<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }} ">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<style type="text/css">
		.font {
			font-size: 15px;			
		}
	</style> -->
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="collapse navbar-collapse">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="pelanggan">Pelanggan</a>
				<a class="nav-item nav-link" href="jenis_kendaraan">Jenis Kendaraan</a>
				<a class="nav-item nav-link" href="kendaraan">Kendaraan</a>
				<a class="nav-item nav-link" href="penjualan">Penjualan</a>
				<a class="nav-item nav-link" href="karyawan">Karyawan</a>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>