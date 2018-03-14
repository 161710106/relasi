<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
	 protected $table = 'santris';
    protected $fillable = ['nama','nis','pelajaran_id'];
    public $timestamps = true;

  public function Pelajaran()

    {
    	return $this->belongsTo('App\Pelajaran','pelajaran_id');
    }

     }

