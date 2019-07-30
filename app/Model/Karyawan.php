<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
	protected $guarded=['id'];
	public $table='karyawan';
	protected $fillable = ['nama_karyawan','file','jenis_kelamin','alamat','no_tlp'];
	public $timestamps = false;
}
