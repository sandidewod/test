<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departmen extends Model
{
    protected $table = 'departmen';
    protected $primaryKey = 'id_dept';

    public function pegawai(){
      return $this->hasMany('App\pegawai','id_dept');
    }
}
