@extends('pages.base')

@section('header')
    <title>{{ $jumbotron['title'] }} - {{ setting_config('title','') }}</title>
    <meta name="keywords" content=",{{ setting_config('seo_key') }}" />
    <meta name="description" content=",{{ setting_config('seo_desc') }}">
@endsection

@section('jumbotron-title')
    {{ $jumbotron['title'] }}
@endsection

@section('jumbotron-desc')
    {{ $jumbotron['desc'] }}
@endsection

@section('left')
    <ol class="repo-list">
        @if(!empty($articles))
            @foreach($articles as $article)
                <li class="repo-list-item">
                    <h3 class="repo-list-name">
                        <a href="{{ route('article.show',array('id'=>$article->slug ? $article->slug : $article->id)) }}" title="{{ $article->title }}">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="repo-list-description">
                        {{ str_cut(convert_markdown($article->content),80) }}
                    </p>
                    <p class="repo-list-meta">
                        <span class="fa fa-clock-o"></span>{{ $article->created_at->format('Y-m-d H:i') }} &nbsp;&nbsp;<span class="fa fa-folder-o"></span><a href="/category/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                        &nbsp;&nbsp;<span class="fa fa-tags"></span>
                        @foreach($article->tags as $tag)
                            <a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
                        @endforeach
                    </p>
                </li>
            @endforeach
        @endif
    </ol>
    <div class="pagination text-align">
        <nav>
            {!! $page->render() !!}
        </nav>
    </div>
@endsection