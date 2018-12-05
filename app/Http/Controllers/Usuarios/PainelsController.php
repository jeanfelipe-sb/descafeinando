<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use Illuminate\Support\Facades\Redirect;

class PainelsController extends Controller {

    public function index() {
        $comentarios = Comentario::where('approved', false)->get();
        return view('usuarios.painel', compact('comentarios'));
    }

    

}
