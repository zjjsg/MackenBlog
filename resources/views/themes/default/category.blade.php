@extends('themes.default.layouts')

@section('header')
    <title>{{ $category->cate_name }}_{{ systemConfig('title','Enda Blog') }} -Powered By  {{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ $category->cate_name }},{{ $category->seo_key }},{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ $category->seo_desc }}">
@endsection

@section('content')
    <div class="jumbotron geopattern" pattern-id="{{ $category->cate_name }}">
        <div class="container article-banner">
            <h1 class="jumbotron-title">分类：{{ $category->cate_name }}</h1> 
            <p class="jumbotron-desc">
                {{ $category->seo_desc }}
            </p> 
        </div>
    </div>

    <!-- /.banner -->
    <section class="container content">
        <div class="columns">
            <div class="column two-thirds" >
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
                                    {{ strCut(conversionMarkdown($article->content),80) }}
                                </p>
                                <p class="repo-list-meta">
                                    <span class="octicon octicon-calendar"></span>{{ $article->created_at->format('Y-m-d') }}
                                </p>
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
            <div class="column one-third">
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