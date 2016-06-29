@extends('themes.default.layouts')

@section('header')
    <title>关于_{{ systemConfig('title','Macken Cabin') }}</title>
    <meta name="keywords" content="关于,{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{!! str_limit(preg_replace('/\s/', '',strip_tags(conversionMarkdown($userInfo->desc))),100) !!}">
@endsection

@section('content')
    <div class="jumbotron geopattern" pattern-id="{{ $userInfo->name }}">
        <div class="container article-banner">
            <h1 class="jumbotron-title">关于</h1> 
            <p class="jumbotron-desc">
                这个有点情怀，但又有些心事的博客。
            </p>
        </div>
    </div>

    <section class="container">
        <div class="row">
            <div class="col-sm-8">
                <article class="article-content markdown-body">
                    {!! conversionMarkdown($userInfo->desc) !!}
                </article>
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