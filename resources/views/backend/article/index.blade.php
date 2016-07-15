@extends('backend.app')

@section('content')

        {!! Notification::showAll() !!}
            <div class="panel panel-default">
                
                <div class="panel-heading">文章管理</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.article.create')}}">写文章</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>所属分类</th>
                            <th>作者</th>
                            <th>游览次数</th>
                            <th>创建时间</th>
                            <th class="text-right">操作</th>
                        </tr>

                        @foreach($articles as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->title }}</td>
                            <td>{!! $v->category ? $v->category->name : '单页' !!}</td>
                            <td>{{ $v->user->name }}</td>
                            <td>{{ $v->status['views'] }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">


                                {!! Form::open([
                                'route' => array('backend.article.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    删除
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.article.edit', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    修改
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
                {!! $articles->render() !!}
            </div>

@endsection
