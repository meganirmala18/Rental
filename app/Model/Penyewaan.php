<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $guarded=['id'];
	public $table='penyewaan';
	public $timestamps = false;

	public function penyewaan_detail()
	{
		return $this->hasMany('App\Model\Penyewaan_detail');
	}
	public function pelanggan()
	{
		return $this->belongsTo('App\Model\Pelanggan');
	}
}
