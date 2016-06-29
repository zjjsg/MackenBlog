@extends('themes.default.layouts')

@section('header')
    <title>{{ systemConfig('title','') }} | {{ systemConfig('subheading', '') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>麦肯先生</h1>
        <p>
            Simplicity is the essence of happiness.
        </p> 
    </div>  
</div>

<!-- /.banner -->
<section class="container content">
    <div class="row">
        <div class="col-sm-8" >
            <ol class="repo-list">
                @if(!empty($articleList))
                    @foreach($articleList['data'] as $article)
                        <li class="repo-list-item">
                            <h3 class="repo-list-name">
                                <a href="{{ route('article.show',array('id'=>$article->id)) }}" title="{{ $article->title }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="repo-list-description">
                                {{ strCut(conversionMarkdown($article->content),76) }}
                            </p>
                            <p class="repo-list-meta">
                                <span class="fa fa-calendar"></span>{{ $article->created_at->format('Y-m-d') }} &nbsp;&nbsp;<span class="fa fa-folder-o"></span><a href="{{ route('category.show',array('as_name'=>$article->category->as_name)) }}">{{ $article->category->cate_name }}</a>
                            </p>
                        </li>
                    @endforeach
                @endif
            </ol>
        </div>
        <div class="col-sm-4">
            @include('themes.default.right')
        </div>
    </div>
    <div class="pagination text-align">
        <nav>
           {!! $articleList['page']->render($page) !!}
        </nav>
    </div>
    <!-- /pagination -->
</section>
<!-- /section.content -->

@endsection