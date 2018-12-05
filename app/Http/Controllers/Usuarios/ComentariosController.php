<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use Illuminate\Support\Facades\Redirect;

class ComentariosController extends Controller {

    public function index() {
        $comentarios = Comentario::select()->paginate(10);
        return view('usuarios.comentarios.index', compact('comentarios'));
    }

    public function aprovarComentario($id) {
        $comentario = Comentario::find($id);

        $comentario->approved = true;
        $update = $comentario->update();

        if ($update) {
            return Redirect::route('painel')->with('msg', 'Comentário aprovado!');
        } else {
            return Redirect::back()->withErrors('Erro ao aprovador o comentário!');
        }
    }

    public function destroy($id) {
        $delete = Comentario::find($id)->delete();

        if ($delete) {
            return Redirect::route('comentarios')->with('msg', 'Comentário rejeitado!');
        } else {
            return Redirect::back()->withErrors('Erro ao rejeitar o comentário!');
        }
    }

}
