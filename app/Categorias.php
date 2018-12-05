<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model {

    protected $table = 'categorias';

    public function posts() {
        return $this->hasMany('App\Post');
    }

}
