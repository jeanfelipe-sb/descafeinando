<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Comentario;

class PostsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filtro = null) {
        switch ($filtro) {
            case 'desativados':
                $posts = Post::onlyTrashed()->orderBy('deleted_at', 'asc')->get();
                break;

            default:
                $posts = Post::orderBy('created_at', 'asc')->get();
                break;
        }
        return view('usuarios.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorias = Categorias::all();
        return view('usuarios.posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categoria_id' => 'required|integer',
            'slug' => 'required|string|max:50'
                ], [
            'required' => 'Este campo é obrigatório',
            'slug.max' => 'O campo slug pode receber até 50 caractéres'
        ]);

        $dataForm = $request->all();
        $post = new Post();

        $dataForm['user_id'] = Auth::user()->id;

        //Upload imagem
        Storage::disk('upl_capa_post')->put('post_' . $dataForm['title'] . '.jpg', file_get_contents($request->file('img')));
        $dataForm['img'] = 'post_' . $dataForm['title'] . '.jpg';

        $insert = $post->create($dataForm);

        if ($insert) {
            return Redirect::route('posts.index')->with('msg', 'Post foi criado com sucesso!');
        } else {
            return back()->withErrors('Senha Atual não é compatível.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categorias = Categorias::all();
        $post = Post::find($id);
        $comentarios = Comentario::all();


        //Se não existir o post dar mansagem de erro
        if (empty($post)) {
            return Redirect::route('posts.index')->withErrors('O post não existe');
        } else {
            return view('usuarios.posts.create', compact('categorias', 'post','comentarios'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $post = Post::find($id);
        $dataForm = $request->all();

        if ($request->file('img')) {
            //Upload imagem
            Storage::disk('upl_capa_post')->put('post_' . $dataForm['title'] . '.jpg', file_get_contents($request->file('img')));
            $dataForm['img'] = 'post_' . $dataForm['title'] . '.jpg';
        }
        $update = $post->update($dataForm);


        if ($update) {
            return Redirect::route('posts.index')->with('msg', 'Post foi atualizado com sucesso!');
        } else {
            return back()->withErrors('Erro em atualizar o post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Post::find($id)->delete();
        return back()->with('msg', 'Usuário Deletado Com Sucesso.');
    }

}
