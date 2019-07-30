<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Pelanggan extends Model
{
    protected $guarded=['id'];
    public $table='pelanggan';
    public $timestamps = false;
    public $fillable = [
    	'file',
		'nama_pelanggan',
		'jenis_kelamin',
		'alamat',
		'no_tlp'
	];

    public function penyewaan()
	{
		return $this->belongsToMany(Penyewaan::class);
	}
	
}
