@extends('themes.default.layouts')

@section('header')
    <title>{{ $article->title }}_{{ systemConfig('title','Enda Blog') }} -Powered By  {{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ $article->title }},{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{!! str_limit(preg_replace('/\s/', '',strip_tags(conversionMarkdown($article->content))),100) !!}">
@endsection

@section('content')
<div class="jumbotron geopattern" pattern-id="{{ $article->title }}">
    <div class="container article-banner">
        <h1 class="jumbotron-title">{{ $article->title }}</h1>
        <p class="jumbotron-desc">
            {{ strCut(conversionMarkdown($article->content),40) }}
        </p>
        <p class="jumbotron-meta"><span class="fa fa-calendar"></span> {{ $article->created_at->format('Y-m-d') }} &nbsp;&nbsp;<span class="fa fa-folder-o"></span> <a href="{{ route(
    'category.show', ['id'=>$article->category->as_name]) }}">{{ $article->category->cate_name }}</a> &nbsp;&nbsp;<span class="fa fa-tags"></span>
            @foreach($article->tags as $tag)
                <a href="/search/tag/{{ $tag->id }}">{{ $tag->name }}</a>&nbsp;
            @endforeach
         </p>
    </div>  
</div>
  
    <!-- /.banner -->
    <section class="container">
        <div class="row">
            <div class="col-sm-8">
                <article class="article-content markdown-body">
                    {!! conversionMarkdown($article->content) !!}
                </article>
                <div class="share">
                    <div class="share-bar"></div>
                </div>
                <!-- 多说评论框 start -->
                    <div class="ds-thread" data-thread-key="{{ $article->id }}" data-title="{{ $article->title }}" data-url="{{ route('article.show',array('id'=>$article->id)) }}"></div>
                <!-- 多说评论框 end -->
                <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                <script type="text/javascript">
                var duoshuoQuery = {short_name:"macken"};
                    (function() {
                        var ds = document.createElement('script');
                        ds.type = 'text/javascript';ds.async = true;
                        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                        ds.charset = 'UTF-8';
                        (document.getElementsByTagName('head')[0] 
                         || document.getElementsByTagName('body')[0]).appendChild(ds);
                    })();
                    </script>
                <!-- 多说公共JS代码 end -->
                <div class="comment">
                    <div class="comments">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            var disqus_shortname = "{{ config('disqus.disqus_shortname') }}";
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the &lt;a href="http://disqus.com/?ref_noscript"&gt;comments powered by Disqus.&lt;/a&gt;</noscript>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                @include('themes.default.right')
            </div>
        </div>
    </section>
@endsection