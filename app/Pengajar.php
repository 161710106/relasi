<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
     protected $table = 'pengajars';
    protected $fillable = ['nama','nik'];
    public $timestamps = true;

  public function Pelajaran()
    {
    	return $this->hasMany('App\Pelajaran','pengajar_id');
    }
}
