@extends('site.layouts.posts')

@section('content')

<div class="col-lg-8 posts-list">
    <div class="single-post row">
        <div class="col-lg-12">
            <div class="text-center">
                <a class="posts-title" href="#"><h3>{{$post->title}}</h3></a>
            </div>
            <div class="feature-img">
                <img class="img-fluid" src="{{ url('assets/capas_posts/'.$post->img) }}">
            </div>
        </div>
        <div class="col-lg-12  col-md-12 meta-details">
            <div class="user-details row">
                <p class="date col-md-3 col-6"><a href="#">{{$post->created_at->diffForHumans()}}</a> <span class="fa fa-calendar-o"></span></p>
                <p class="user-name col-md-3 col-6"><a href="#">By {{$post->user->name}}</a> <span class="fa fa-user-o"></span></p>
                <p class="comments col-md-3 col-6"><a href="#">06 Comments</a> <span class="fa fa-comment-o"></span></p>                        
            </div>

            <ul class="tags">
                <li><a href="#">Food,</a></li>
                <li><a href="#">Technology,</a></li>
                <li><a href="#">Politics,</a></li>
                <li><a href="#">Lifestyle</a></li>
            </ul>
        </div>
        <div class="col-lg-12">
            {!!$post->content!!}
        </div>
    </div>

    <div class="comments-area">
        <h4>{{count($comentarios)}} Comentários</h4>
        @foreach($comentarios as $comentario)
        <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="{{ url('assets/avatar/comment.png')}}">

                        <img src="img/blog/c1.jpg" alt="">
                    </div>
                    <div class="desc">
                        <h5><a href="#">{{$comentario->name}}</a></                            h5>
                            <p class="date">{{$comentario->created_at}}</p>
                            <p class="comment">
                                {{$comentario->content}}
                            </p>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
    <div class="comment-form">
        <h4>Comente algo!</h4>
        <form action="{{route('site.posts.comentario')}} " method="POST">
            {{ csrf_field() }}
            <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-12 nam                e">
                    <input required="" type="text" class="form-control" id="name" name="name" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'">
                </div>
                <div class="form-group col-lg-6 col-md-12 email">
                    <input required="" type="email" class="form-control" id="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'">
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control mb-10" rows="5" name="content" placeholder="Menssegem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Menssegem'"
                          required=""></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}" >

            <button href="#" class="primary-btn" data-text="Comentar" type="submit">
                <span>C</span>
                <span>o</span>
                <span>m</span>
                <span>e</span>
                <span>n</span>
                <span>t</span>
                <span>a</span>
                <span>r</span>
            </button>
        </form>
    </div>
</div>
@endsection
