<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";

   	protected $fillable = [
   		'user_id', 'name', 'is_active', 'description', 'sort_order'
   	];

    public function Uptimes()
    {
    	return $this->hasMany('App\Uptimes','id_projects','id');
    }
   public function UptimeData()
   {
   		return $this->hasManyThrough('App\UptimeData','App\Uptimes','id_projects','id_uptimes','id');
   }
    public function User()
   {
     # code...
    return $this->belongsTo('App\User');
   }

}
