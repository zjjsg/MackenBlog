@extends('backend.app')

@section('content')

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
                    {!! Form::model($article, ['route' => ['backend.article.update', $article->id], 'method' => 'PATCH','enctype'=>'multipart/form-data']) !!}

                    @include('backend.article.form', ['submitBtnTxt'=>'修改'])
                        
                    {!! Form::close() !!}
                </div>
            </div>

@endsection
