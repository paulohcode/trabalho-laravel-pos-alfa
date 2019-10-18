<!-- dashboard.blade.php -->
@extends('site.templates.master')

@section('conteudo')	

<div class="slide">
    @if (!empty($destaques))
        @foreach ($destaques as $idx => $destaque)
            <?php $first = $idx === 0 ?>
            <div class="col-md-{{ $first ? '8' : '4' }}">
                <article class="{{ $first ? 'img-big' : 'img-small col-md-12 col-sm-6 col-xm-12' }}">
                    <a href="" title="">
                        <img src="{{ !empty($destaque->image) ? "assets/uploads/post/{$destaque->image}" : 'imgs/placeholder.jpg' }}" 
                        alt="" class="img-slide-{{ $first ? 'big' : 'small'}}">
        
                        <h1 class="text-slide">
                            {{ $destaque->title }}
                        </h1>
                    </a>
                </article>
            </div>
        @endforeach
    @endif
</div><!--Slide-->


<section class="content">
    <div class="col-md-8">
        @if (!empty($posts))
        @foreach ($posts as $idx => $post)
            <article class="post">
                <div class="image-post col-md-4 text-center">
                    <img src="{{ !empty($post->image) ? "assets/uploads/post/{$post->image}" : 'imgs/placeholder.jpg' }}" alt="{{ $post->title }}" class="img-post">
                </div>
                <div class="description-post col-md-8">
                    <h2 class="title-post">{{ $post->title }}</h2>

                    <p class="description-post">
                        @if (mb_strlen($post->description) > 60)
                            {{ mb_substr($post->description, 0, 60) }}
                        @else
                            {{ $post->description }}
                        @endif
                    </p>

                    <div class="clearfix"></div>
                    <a class="btn-post" href="?pg=post">Ir <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </article>
        @endforeach
    @endif

    
    <div class="pagination-posts">
            <nav aria-label="Page navigation">
                {{ $posts->links() }}
            </nav>
        </div>

    </div><!--POSTS-->

    <!--Sidebar-->
    <div class="col-md-4">
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FfaculdadeAlfaUmuarama%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=316115088513380" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>		</section>

@endsection


