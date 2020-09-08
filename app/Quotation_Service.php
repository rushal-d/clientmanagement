<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Servicetype;

class Quotation_Service extends Model
{
    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function servicetype(){
        return $this->belongsTo(Servicetype::class, 'servicetype_id', 'id');
    }

    public function quotation(){
        return $this->hasMany(Quotation_Service::class, 'quotation_id', 'quotation_id');
    }

}
