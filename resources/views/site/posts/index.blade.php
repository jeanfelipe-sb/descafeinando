@extends('site.layouts.posts')

@section('content')

<div class="col-lg-8 posts-list">
    @foreach($posts as $post)
    <div class="single-post row">
        <div class="col-lg-3  col-md-3 meta-details">
            <ul class="tags">
                <li><a href="#">Food,</a></li>
                <li><a href="#">Technology,</a></li>
                <li><a href="#">Politics,</a></li>
                <li><a href="#">Lifestyle</a></li>
            </ul>
            <div class="user-details row">
                <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$post->user->name}}</a> <span class="lnr lnr-user"></span></p>
                <p class="date col-lg-12 col-md-12 col-6">{{$post->created_at->diffForHumans()}} <span class="lnr lnr-calendar-full"></span></p>
                <p class="comments col-lg-12 col-md-12 col-6">{{count($post->comentario)}} Comentários <span class="lnr lnr-bubble"></span></p>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 ">
            <div class="feature-img">
                <a href="{{route('site.posts.show',$post->id)}}">
                    <img class="img-fluid" src="{{ url('assets/capas_posts/'.$post->img) }}">
                </a>
            </div>
            <a class="posts-title" href="{{route('site.posts.show',$post->id)}}"><h3>{{$post->title}}</h3></a>
            <p class="excert">
                {{$post->description}}
            </p>
            <a href="{{route('site.posts.show',$post->id)}}" class="primary-btn" data-text="Ver Post Completo">
                <span>V</span>
                <span>e</span>
                <span>r</span>
                <span> </span>
                <span>P</span>
                <span>o</span>
                <span>s</span>
                <span>t</span>
                <span> </span>
                <span>C</span>
                <span>o</span>
                <span>m</span>
                <span>p</span>
                <span>l</span>
                <span>e</span>
                <span>t</span>
                <span>o</span>
            </a>
            <hr>

        </div>
    </div>

    @endforeach


    <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination">
            {!! $posts->links() !!}
        </ul>
    </nav>
</div>

@endsection
