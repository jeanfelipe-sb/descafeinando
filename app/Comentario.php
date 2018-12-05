<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    protected $table = 'comentarios';
    protected $fillable = ['name', 'id', 'post_id', 'content', 'email'];
    
    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }

}
