@extends('admin.default.layouts.baseCont')
@section('content')
    <div class="ml-2 mr-2">

        <form class="layui-form ui-form">
            {!! $form_tpl !!}
        </form>
    </div>



@endsection
@section('foot_js')
    {{--监听页面是否存在编辑器类，存在就加载它--}}
    @include('admin.default.tpl.listenEditorCreate')
    <script>

        layui.use(['uform', 'layer', 'request'], function () {
            var form = layui.uform;
            var req = layui.request;
            var layer = layui.layer;
            form.on('submit(LAY-form-submit)', function (obj) {
                req.post('{{ action($controller_name.'@store') }}', obj.field, function (res) {
                    layer.msg(res.msg);
                })

            });


        });
    </script>


@endsection