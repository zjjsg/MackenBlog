@extends('backend.app')

@section('content')

        {!! Notification::showAll() !!}
            <div class="panel panel-default">
                <div class="panel-heading">分类管理</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ URL::route('backend.category.create')}}">创建分类</a>

                    <table class="table table-hover table-top">
                        <tr>
                            <th>#</th>
                            <th>分类名称</th>
                            <th>创建时间</th>
                            <th class="text-right">操作</th>
                        </tr>

                        @foreach($category as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->html}} {{ $v->name }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">




                                {!! Form::open([
                                'route' => array('backend.category.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    删除
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                    'route' => array('backend.category.edit', $v->id),
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
            </div>
   
@endsection
