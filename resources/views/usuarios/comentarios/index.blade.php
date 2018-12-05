@extends('usuarios.layouts.app')

@section('content')

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
    <li class="list-group-item"><h4 class="text-center">Comentários</h4></li>
    <li class="list-group-item">

        <table class="table">
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
            {!! $comentarios->links() !!}

    </li>
</ul>
@endsection

