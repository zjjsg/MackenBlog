@extends('backend.app')

@section('content')
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">基本设置</div>

                <div class="panel-body">
                    <a class="btn btn-success" href="{{ url('/backend/setting/create') }}">创建设置</a>

                    <form action="{{ url('backend/setting/store')}}" method="post" class="form-horizontal" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table table-hover table-top">
                            <tr>
                                <th>#</th>
                                <th>名称</th>
                                <th>值</th>
                                <th class="text-right">操作</th>
                            </tr>

                            @foreach($setting as $k=> $v)
                            <tr>
                                <th scope="row">{{ $v->id }}</th>
                                <td>
                                    {{Lang::get('backend_config.'.$v->name)}}
                                </td>
                                <td>
                                    {!! Form::text('setting['.$v->name.']', $v->value, ['class' => 'form-control']) !!}
                                </td>
                                <td class="text-right">

                                    <a href="{{ url('/backend/setting/delete',['id'=>$v->id]) }}" class="btn btn-danger" >
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        删除
                                    </a>

                                </td>

                            </tr>
                            @endforeach
                        </table>

                        <button type="submit" class="btn btn-success">
                            保存
                        </button>

                    </form>
                </div>
            </div>
@endsection
