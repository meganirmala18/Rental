<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jenis_Kendaraan extends Model
{
	protected $guarded=['id'];
	public $table='jenis_kendaraan';
	public $timestamps = false;

	public function kendaraan()
	{
		return $this->hasMany('App\Model\Kendaraan');
	}
}
