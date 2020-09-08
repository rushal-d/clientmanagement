<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use App\Quotation_Service;

class Servicetype extends Model
{
    public function service(){
        return $this->hasMany(Service::class, 'servicetype_id');
    }

    public function quotation(){
        return $this->hasMany(Quotation_Service::class, 'servicetype_id');
    }
}
