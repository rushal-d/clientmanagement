<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Servicetype;

class Service extends Model
{
    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function servicetype(){
        return $this->belongsTo(Servicetype::class, 'servicetype_id', 'id');
    }

    public function service(){
        return $this->hasMany(Service::class, 'service_id', 'service_id');
    }
}
