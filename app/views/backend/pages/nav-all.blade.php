@extends('backend.layout')
@section('page_title')
<h1>导航</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form action="{{url('/admin/nav/create')}}" method="post" accept-charset="utf-8" class="">
                        <div class="form-group">
                            <label class="control-label">导航名称</label>
                            <input type="text" name="title" class="form-control" placeholder="" value="{{Input::old('name')}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">链接</label>
                            <input type="text" name="url" class="form-control" placeholder="例如：http://tiangzengsi.com/p/1" value="{{Input::old('slug')}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <button type="submit" class="btn btn-success">添加导航</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /col-md-4-->
    <div class="col-md-8 form-group">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="select-all">
                    </th>
                    <th>名称</th>
                    <th>链接</th>
                    <th>添加时间</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($links))
                <tr>
                    <td colspan="6">目前没有链接</td>
                </tr>
                @else
                @foreach($links as $link)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$link->id}}">
                    </td>
                    <td>
                        {{$link->title}}
                    </td>
                    <td>{{$link->url}}</td>
                    <td>{{$link->created_at}}</td>
                    <td>
                        <div class="td-tool-bar-wrapper">
                            <div class="td-tool-bar">
                                <div class="tips-text">
                                    <a href="{{url('/admin/nav/edit', array('id' => $link->id))}}" class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>编辑
                                    </a>
                                    <a href="{{url('/admin/nav/delete', array('id' => $link->id))}}" class="btn btn-danger btn-sm btn-icon icon-left" onclick="return confirm('确认删除吗？')"> <i class="entypo-cancel"></i>删除</a>
                                </div>
                                    <div class="tips-angle diamond"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="pull-right">
            {{$links->links()}}
        </div>
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
@endsection