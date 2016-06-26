@extends('themes.default.layouts')

@section('header')
    <title>搜索标签{{ $tagName }}_{{ systemConfig('title','Enda Blog') }}-Powered By{{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
@endsection

@section('content')
<div class="jumbotron geopattern" pattern-id="{{ $tagName }}">
    <div class="container article-banner">
        <h1 class="jumbotron-title">标签：{{ $tagName }}</h1> 
        <p class="jumbotron-desc">
            Cool 善于搜索，才能学习更多的东西哦～
        </p> 
    </div>
</div>

<section class="container">
    <div class="row">
        <div class="col-sm-8" >
            <ol class="repo-list">
                @if(!empty($articleList['data']))
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

                @else

                    <li class="repo-list-item">
                        <h3 class="repo-list-name">
                            暂时没搜到关于标签 <span style="color: #f4645f">{{ $tagName }}</span> 的内容，换个关键字试试吧～
                        </h3>
                    </li>
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