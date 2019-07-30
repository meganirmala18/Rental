<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
	protected $guarded=['id'];
	public $table='kendaraan';
	public $timestamps = false;

	protected $fillable = ['file','jenis_kendaraan_id','plat','merk','hargasewa'];
	public function jenis_kendaraan()
	{
		return $this->belongsTo('App\Model\Jenis_Kendaraan');
	}
}
