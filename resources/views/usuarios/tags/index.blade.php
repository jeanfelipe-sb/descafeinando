@extends('usuarios.layouts.app')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><h4 class="text-center">Tags</h3></li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Gerenciar Tags</h3>
            </div>
            <div class="panel-body">
                <form class="" action="{{url()->current()}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tags</label>
                        <input type="text" class="form-control" name="tags">
                        <p class="help-block">Digite as tags separada por vÃ­rgula: exemplo: laravel,php</p>
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </form>
            </div>
            <div class="panel-footer" style="padding:0px;">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->nome}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>

                            <form action="{{ route('tags.destroy' , $tag->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <!-- Button trigger modal -->
                                <a onclick="editarTag('{{$tag->id}}','{{$tag->nome}}')" href="#" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                                    Editar
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
    function editarTag($id, $tag) {
    $('#id').val($id);
    $('#tag').val($tag);
    $('#editarTag').modal('toggle');
    }
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url()->current().'/editar'}}" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Editar Tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {!! method_field('PUT')!!}

                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="">Tag</label>
                        <input type="text" class="form-control" id="tag" name="tag" placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection