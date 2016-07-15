@extends('backend.app')

@section('content')

            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">友链管理</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ route('backend.link.create')}}">添加友链</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>名称</th>
                            <th>地址</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th class="text-right">操作</th>
                        </tr>

                        @foreach($list as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->url }}</td>
                            <td>{{ $v->sequence }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                {!! Form::open([
                                    'route' => array('backend.link.destroy', $v->id),
                                    'method' => 'delete',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    删除
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.link.edit', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-primary">
                                    修改
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>

@endsection
