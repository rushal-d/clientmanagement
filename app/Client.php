<?php

namespace App;

use App\Category;
use App\Service;
use App\Quotation_Service;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $table = 'clients';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function service(){
        return $this->hasMany(Service::class, 'client_id');
    }

    public function quotation(){
        return $this->hasMany(Quotation_Service::class, 'client_id');
    }
}
