<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penyewaan_detail extends Model
{
	protected $guarded=['id'];
	public $table='penyewaan_detail';
	public $timestamps = false;

	public $fillable = [
		'penyewaan_id',
		'kendaraan_id',
		'lamasewa'
	];
	public function penyewaan()
	{
		return $this->belongsTo('App\Model\Penyewaan');
	}
	public function kendaraan()
	{
		return $this->belongsTo('App\Model\Kendaraan');
	}    
	
}
