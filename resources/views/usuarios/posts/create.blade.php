@extends('usuarios.layouts.app')

@section('content')

<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Criar Post</h4></li>
    <li class="list-group-item">
        <a href="{!! url('/painel') !!}">Painel</a> -> Criar Post
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

@if(isset($msg))
<div class="alert alert-success">
    {!! $msg !!}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                @if(isset($post))
                <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                    {!! method_field('PUT')!!}                    
                    @else
                    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" enctype="multipart/form-data">
                            <label for="">Título:</label>
                            <input type="text" class="form-control" name="title" value="{{ isset($post) ? $post->title :old('title')  }}" required autofocus>
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                            <label for="">Capa do post:</label>
                            @if(isset($post))
                            <img src="{{ url('assets/capas_posts/'.$post->img) }}" height="100" >
                            @endif
                            <input type="file" name="img" id="img" accept="image/png, image/jpeg">
                            @if ($errors->has('img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('img') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="">Conteúdo:</label>
                            <textarea  id="content" name="content"><p>{{ isset($post) ? $post->content : old('content') }}</p></textarea >

                            @if ($errors->has('content'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="">Descrição:</label>
                            <textarea type="text" class="form-control" placeholder="description" name="description">{{ isset($post) ? $post->description : old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="">Categoria:</label>
                                    <select name="categoria_id" class="form-control">
                                        @foreach($categorias as $categoria)
                                        @if(isset($post) && $categoria->id == $post->categoria->id)
                                        <option   value="{{$categoria->id}}" selected >{{$categoria->nome}}</option>
                                        @else
                                        <option   value="{{$categoria->id}}" >{{$categoria->nome}}</option>
                                        @endif
                                        @endforeach

                                    </select>                
                                </div>
                            </div>                     

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="">Slug:</label>
                                    <input type="text" class="form-control" name="slug" value="{{ isset($post) ? $post->slug : old('slug') }}" required autofocus>
                                    @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ isset($post) ? 'Editar Post' : '+ Adicionar' }}
                        </button>
                        <br>
                        <br>                        
                    </form>
                    @if(isset($post))

                    <table class="table">
                        <tr>
                            <th>Comentários</th>
                            <th></th>
                        </tr>
                        @foreach($comentarios as $comentario)
                        <tr>
                            <td>
                                {{$comentario->content}}
                                <br><br>
                                <a href="{{route('posts.edit',$comentario->post->id)}}">{{$comentario->post->title}}</a> | 
                                {{$comentario->name}} | 
                                {{$comentario->email}} |
                                {{$comentario->created_at->diffForHumans()}} 
                                <br><br>
                                @if($comentario->approved == false)
                                <form method="POST" action="{{route('approved.comment',$comentario->id)}}">
                                    {{method_field('PUT')}}
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success" >Aprovar</button>
                                </form>
                                @endif
                                <form method="POST" action="{{route('reject.comment',$comentario->id)}}">
                                    {{method_field('DELETE')}}
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger" >Excluir</button>
                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </table>

                    @endif
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#content').summernote();
    });
</script>
@endsection 

@push('scripts')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
@endpush