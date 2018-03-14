<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
protected $table = 'pelajarans';
    protected $fillable = ['nama','pelajaran','pengajar_id'];
    public $timestamps = true;

    	public function Pengajar()
	{
		return $this->belongsTo('App\Pengajar','pengajar_id');
	}

    public function Santri()
    {
    	return $this->hasMany('App\Santri','pelajaran_id');
    }
}

