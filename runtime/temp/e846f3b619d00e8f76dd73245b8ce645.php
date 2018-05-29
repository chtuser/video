<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\phpStudy\PHPTutorial\WWW\video\public/../application/admins\view\admin\index.html";i:1527071591;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
    <style type="text/css">
        .header span {
            background: #009688;
            margin-left: 30px;
            padding: 10px;
            color: #ffffff;
        }

        .header div {
            border-bottom: solid 1px #009688;
            margin-top: 10px;
        }
    </style>
</head>
<body style="padding: 10px;">
<div class="header" id="layerDemo">
    <span>管理员列表</span>


            <button class="layui-btn" style="float: right;height: 28px;line-height: 28px;text-align: center;padding: 0 13px;" data-method="notice" >添加用户</button>




    <div></div>

</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>真实姓名</th>
        <th>角色</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data['lists']) || $data['lists'] instanceof \think\Collection || $data['lists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['lists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $vo['id']; ?></td>
        <td><?php echo $vo['username']; ?></td>
        <td><?php echo $vo['truename']; ?></td>
        <td><?php echo $vo['gid']; ?></td>
        <td><?php echo $vo['status']==0?'正常':'<span style="color: red">禁用</span>'; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$vo['add_time']); ?></td>
        <td>
            <button class="layui-btn layui-btn-xs">编辑</button>
            <button class="layui-btn layui-btn-xs layui-btn-danger ">删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>

</table>


<script>
    layui.use('layer', function(){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

        //触发事件
        var active = {
            setTop: function(){
                var that = this;
                //多窗口模式，层叠置顶

            }
           /* ,notice: function(){
                //示范一个公告层
                layer.open({
                    type: 1
                    ,title: false //不显示标题栏
                    ,closeBtn: false
                    ,area: '300px;'
                    ,shade: 0.2
                    ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                    ,btn: ['火速围观', '残忍拒绝']
                    ,btnAlign: 'c'
                    ,moveType: 1 //拖拽模式，0或者1
                    ,content: '/admins.php/admins/Admin/add'
                    ,success: function(layero){
                        var btn = layero.find('.layui-layer-btn');
                        btn.find('.layui-layer-btn0').attr({
                            href: 'http://www.layui.com/'
                            ,target: '_blank'
                        });
                    }
                });
            }*/

            ,notice:function () {
                layer.open({
                    type: 2,
                    title: '添加用户',
                    offset: 'auto',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['440px', '60%'],
                    content: '/admins.php/admins/Admin/add' //iframe的url
                });

            }
        };

        $('#layerDemo .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });

    });
</script>



</body>
</html>