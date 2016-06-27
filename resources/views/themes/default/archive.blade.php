@extends('themes.default.layouts')

@section('header')
    <title>{{ $archiveTitle }}_{{ systemConfig('title','Macken Cabin') }} - {{ systemConfig('subheading','') }}</title>
    <meta name="keywords" content="{{ $archiveTitle }},{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ $archiveTitle }}的文章">
@endsection

@section('content')
    <div class="jumbotron geopattern" pattern-id="{{ $archiveTitle }}">
        <div class="container article-banner">
            <h1 class="jumbotron-title">{{ $archiveTitle }}</h1> 
            <p class="jumbotron-desc">
                陈列在时光里的记忆，拂去轻尘，依旧如新。
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