<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Categorias;
use Illuminate\Support\Facades\Redirect;
use App\Comentario;

class PostsController extends Controller {

    public function index() {
        $posts = Post::select('id', 'title', 'description', 'user_id', 'img', 'slug', 'created_at')->orderby('created_at', 'DESC')->paginate(6);
        $ultimosPosts = Post::select('id', 'title', 'user_id', 'slug', 'created_at', 'img')->orderby('created_at', 'DESC')->limit(2)->get();
        $categorias = Categorias::all();
        $titulo = 'Últimos Posts';

        return view('site.posts.index', compact('posts', 'categorias', 'ultimosPosts', 'titulo','comentarios'));
    }

    public function show($id) {
        $post = Post::find($id);
        if (empty($post)) {
            //Forçar erro 404
            return abort(404);
        } else {
            $categorias = Categorias::all();
            $titulo = $post->title;
            $ultimosPosts = Post::select('id', 'title', 'user_id', 'slug', 'created_at', 'img')->orderby('created_at', 'DESC')->limit(2)->get();
            $comentarios = Comentario::where('post_id', '=', $id)->where('approved', true)->get();

            return view('site.posts.show', compact('post', 'categorias', 'titulo', 'ultimosPosts', 'comentarios'));
        }
    }

    public function addComentario(Request $request) {


        $formData = $request->all();

        $post_id = $formData['post_id'];
        $comentario = new Comentario();
        $insert = $comentario->create($formData);

        if ($insert) {
            return Redirect::route('site.posts.show', $post_id)->with('msg', 'Comentário criado com sucesso. Aguarde a aprovação!');
        } else {
            return back()->withErrors('Erro ao adicionar o comentário.');
        }
    }

}
