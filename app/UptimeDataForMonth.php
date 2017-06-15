<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UptimeDataForMonth extends Model
{
    protected $table = 'uptime_data_for_months';

    protected $fillable = [
    	'uptime_data_id','month','ratio'
    ];

    public function UptimeData()
    {
    	return $this->belongTo('App\UptimeData','uptime_data_id','id');
    }
}
