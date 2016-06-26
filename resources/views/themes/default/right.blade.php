
<section class="panel panel-primary">
    <div class="panel-heading">
    <div class="panel-title">热门文章</div>
    </div>
    <ul class="list-group">
        @if(!empty($hotArticleList))
            @foreach($hotArticleList as $hotArticle)
                <li class="list-group-item">
                    <a href="{{ route('article.show',array('id'=>$hotArticle->id)) }}" title="{{ $hotArticle->title }}">
                        <span>
                            {{ $hotArticle->title }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</section>



<div class="panel panel-primary">
    <div class="panel-heading">
    <div class="panel-title">标签云</div>
    </div>
    <div class="content tag-cloud">
        @if(!empty($tagList))
            @foreach($tagList as $tag)
                <a href="{{ url('search/tag',['id'=>$tag->id]) }}" title="{{ $tag->name }}">{{ $tag->name }}</a>
            @endforeach
        @endif
    </div>
</div>

<section class="panel panel-primary">
    <div class="panel-heading">
    <div class="panel-title">友情链接</div>
    </div>
    <ul class="boxed-group-inner mini-repo-list">
        @if(!empty($linkList))
            @foreach($linkList as $link)
                <li class="public source ">
                    <a href="{{ $link->url }}" target="_blank"  class="mini-repo-list-item css-truncate">
                        <span class="repo-and-owner css-truncate-target">
                            {{ $link->name }}
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</section>