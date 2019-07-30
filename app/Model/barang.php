<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $guarded=['id_barang'];
    public $table='barang';
}
