@extends('pages.base')

@section('header')
    <title>{{ $article->title }} - {{ setting_config('title','') }}</title>
    <meta name="keywords" content="{{ $article->title }},{{ setting_config('seo_key') }}" />
    <meta name="description" content="{!! str_limit(preg_replace('/\s/', '',strip_tags(convert_markdown($article->content))),100) !!},{{ setting_config('seo_desc') }}">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/social-share.js/dist/css/share.min.css') }}">
@endsection

@section('jumbotron-title')
    {{ $article->title }}
@endsection

@section('jumbotron-desc')
    {{ str_cut(convert_markdown($article->content),40) }}
@endsection

@section('jumbotron-meta')
    <span class="fa fa-calendar"></span> {{ $article->created_at->format('Y-m-d') }}
    &nbsp;&nbsp;<span class="fa fa-folder-o"></span>
    <a href="/category/{{ $article->category->slug }}">{{ $article->category->name }}</a>
    &nbsp;&nbsp;<span class="fa fa-tags"></span>
    @foreach($article->tags as $tag)
        <a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
    @endforeach
@endsection
  
@section('left')
                <article class="article-content markdown-body">
                    {!! convert_markdown($article->content) !!}
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

                
                <!-- <div class="comment">
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
                </div> -->
@endsection