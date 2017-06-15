<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UptimeData extends Model
{
   	protected $table = 'uptime_data';

   	protected $fillable = [
   	'uptime_id', 'response_time', 'status', 'check_failure_reason', 'check_times_faile', 'certificate_statusd', 'certificate_expiration_date', 'certificate_issuer', 'title', 'description', 'view', 'menu', 'ccu'	
   	];
   	public function Uptimes()
   	{
   		return $this->belongTo('App\Uptimes','id_uptimes','id');
   	}
}
