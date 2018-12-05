<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'slug', 'categoria_id', 'user_id','img','description'];
    protected $dates = ['deleted_at'];

    public function categoria() {
        return $this->belongsTo('App\Categorias', 'categoria_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function comentario() {
        return $this->hasMany('App\Comentario');
    }

}
