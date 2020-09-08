<?php

namespace App;

use \App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function clients(){
        return $this->hasMany(Post::class, 'category_id');
    }
}
