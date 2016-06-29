@extends('themes.default.layouts')

@section('header')
    <title>搜索{{ $keyword }}_{{ systemConfig('title','Enda Blog') }}-Powered By{{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
@endsection

@section('content')
<div class="jumbotron geopattern" pattern-id="{{ $keyword }}">
    <div class="container article-banner">
        <h1 class="jumbotron-title">关键字：{{ $keyword }}</h1> 
        <p class="jumbotron-desc">
            Cool 善于搜索，才能学习更多的东西哦～
        </p> 
    </div>
</div>

<div class="container">
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
                                <span class="octicon octicon-calendar"></span>{{ $article->created_at->format('Y-m-d') }} &nbsp;&nbsp;<span class="fa fa-folder-o"></span><a href="{{ route('category.show',array('as_name'=>$article->category->as_name)) }}">{{ $article->category->cate_name }}</a>
                            </p>
                        </li>
                    @endforeach

                @else

                    <li class="repo-list-item">
                        <div class="well">
                            暂时没搜到关于关键字 <span style="color: #f4645f">{{ $keyword }}</span> 的内容，换个关键字试试吧～
                        </div>
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
           {!! $articleList['page']->appends(['keyword' => $keyword])->render($page) !!}
        </nav>
    </div>
    
</div>

@endsection