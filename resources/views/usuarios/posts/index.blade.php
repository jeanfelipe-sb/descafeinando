@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Listar Posts</h4></li>
    <li class="list-group-item">
        <a href="{!! url('/painel') !!}">Painel</a> -> Listar Posts
    </li>
</ul>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('msg'))
<div class="alert alert-success">
    {!! session('msg') !!}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Lista de Posts</div>
            <div class="panel-body">

                <a href="{{route('posts.create')}}">+ Adicionar Post</a>

                <div style="width:300px;" class="input-group pull-right">
                    <input type="text" class="form-control" placeholder="Pesquisar...">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros</button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{!! url('/painel/posts/index/desativados') !!}">Desativados</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Modelador</th>
                    <th>Data Publicação</th>
                    <th></th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id }}</td>
                    <td>{{$post->title }}</td>
                    <td>{{$post->categoria->nome }}</td>


                    <td>{{$post->user->name }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                        @if(!$post->deleted_at)
                        <form action="{{ route('posts.destroy' , $post->id)}}" method="POST">
                            {!! method_field('DELETE')!!}                    

                            {{ csrf_field() }}
                            
                            <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn btn-sm btn-success">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
