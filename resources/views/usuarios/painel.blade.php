@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Minhas Configurações</h4></li>
    <li class="list-group-item">
        <a href="{!! url('/painel') !!}">Painel</a> -> Configurações
    </li>
</ul>

<!-- Mensagem para confirmação -->
@if (session('msg'))
<div class="alert alert-success">
    {!! session('msg') !!}

</div>
@endif

<!-- Mensagem do validate -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> 
            {!! $error !!}
        </li>
        @endforeach
    </ul>
</div>
@endif

<!-- Mensagem para erros -->
@if(session('erro'))
<div class="alert alert-danger">   
    {!! session('erro') !!}
</div>
@endif

<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Painel</h4></li>
    <li class="list-group-item">

        <table class="table">
            <tr>
                <th>Comentários pendentes</th>
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
                    <form method="POST" action="{{route('approved.comment',$comentario->id)}}">
                        {{method_field('PUT')}}
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-success" >Aprovar</button>
                    </form>
                     <form method="POST" action="{{route('reject.comment',$comentario->id)}}">
                        {{method_field('DELETE')}}
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger" >Rejetar</button>
                    </form>

                </td>

            </tr>
            @endforeach
        </table>

    </li>
</ul>
@endsection

