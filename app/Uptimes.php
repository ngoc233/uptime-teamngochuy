<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uptimes extends Model
{
    protected $table = 'uptimes';

    protected $fillable = [
   		'project_id', 'user_id', 'url', 'check_interval', 'is_active', 'min_response_time', 'contain_string', 'certificate_check'
   	];

    public function Projects()
    {
    	return $this->belongTo('App\Projects','id_projects','id');
    }
    public function UptimeData()
    {
    	return $this->hasMany('App\UptimeData','id_uptimes','id');
    }
}
