@extends('backend.content.common')

@section('content')

<!-- Tokenfield CSS -->
<link href="{{ asset('/plugin/tags/css/bootstrap-tokenfield.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('/plugin/tags/css/jquery-ui.css ') }}" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/bower_components/editor.md/css/editormd.min.css')}}" />
<script type="text/javascript" src="{{ asset('/bower_components/editor.md/editormd.min.js') }}"></script>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">编辑文章</div>

                @if ($errors->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong>
                    {{ $errors->first('error', ':message') }}
                    <br />
                    请联系开发者！
                </div>
                @endif

                <div class="panel-body">
                    {!! Form::model($article, ['route' => ['backend.article.update', $article->id], 'method' => 'put','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-7">
                                {!! Form::text('title', $article->title, ['class' => 'form-control','placeholder'=>'title']) !!}
                                <font color="red">{{ $errors->first('title') }}</font>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">所属分类</label>
                            <div class="col-sm-7">
                                {!! Form::select('cate_id', $catArr , null , ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-7">
                                {!! Form::text('tags', '', ['class' => 'form-control','placeholder'=>'回车确定','id'=>'tags']) !!}
                                <font color="red">{{ $errors->first('tags') }}</font>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">封面图</label>
                            <div class="col-sm-7">
                                {!! Form::file('pic') !!}
                                <font color="red">{{ $errors->first('pic') }}</font>
                                @if(!empty($article->pic))
                                    <img  src="{{ asset('/uploads').'/'.$article->pic }}" width="300px" height="100"/>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-9">
                                <div id="editormd">
                                    {!! Form::textarea('content', $article->content, ['class' => 'form-control']) !!}
                                </div>
                                <font color="red">{{ $errors->first('content') }}</font>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::submit('修改', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


<script type="text/javascript" src="{{ asset('/plugin/tags/jquery-ui.js ') }}"></script>
<script type="text/javascript" src="{{ asset('/plugin/tags/bootstrap-tokenfield.js ') }}" charset="UTF-8"></script>

<script type="text/javascript">
    $('#tags').tokenfield({
        autocomplete: {
            source: <?php echo  \App\Model\Tag::getTagStringAll()?>,
            delay: 100

        },
        showAutocompleteOnFocus: !0,
        delimiter: [","],
        tokens: <?php echo  \App\Model\Tag::getTagStringByTagIds($article->tags)?>
    })

    $(function() {
        var editor = editormd("editormd", {
            emoji: true,
            flowChart : true,
            tex  : true,
            htmlDecode : true,
            htmlDecode : "style,script,iframe,sub,sup",
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadToken : '{{ csrf_token() }}',
            imageUploadURL : "/backend/upload/",
            height  : 420,
            path : "{{ asset('bower_components/editor.md/lib') }}/" // Autoload modules mode, codemirror, marked... dependents libs path
        });
    });
</script>
@endsection
