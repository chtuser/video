<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\phpStudy\PHPTutorial\WWW\video\public/../application/admins\view\admin\index.html";i:1527504189;}*/ ?>
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


    <button class="layui-btn" style="float: right;height: 28px;line-height: 28px;text-align: center;padding: 0 13px;"
            data-method="notice" onclick="add()">添加用户
    </button>


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
        <td><?php echo isset($data['groups'][$vo['gid']])?$data['groups'][$vo['gid']]['title']:''; ?></td>
        <td><?php echo $vo['status']==0?'正常':'<span style="color: red">禁用</span>'; ?></td>
        <td><?php echo date('Y-m-d H:i:s',$vo['add_time']); ?></td>
        <td>
            <button class="layui-btn layui-btn-xs" onclick="add(<?php echo $vo['id']; ?>)">编辑</button>
            <button class="layui-btn layui-btn-xs layui-btn-danger " onclick="del(<?php echo $vo['id']; ?>)">删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>

</table>


<script type="text/javascript">
    layui.use(['layer'], function () {
        layer = layui.layer;
        $ = layui.jquery;
    });

    // 添加编辑
    function add(id) {
        layer.open({
            type: 2,
            title: id > 0 ? '编辑管理员' : '添加管理员',
            shade: 0.3,
            area: ['480px', '420px'],
            content: '/admins.php/admins/Admin/add?id=' + id
        });
    }

    // 删除
    function del(id) {
        layer.confirm('确定要删除吗？', {
            btn: ['确定', '取消']
        }, function () {
            $.post('/admins.php/admins/Admin/delete', {'id': id}, function (res) {
                if (res.code > 0) {
                    layer.alert(res.msg, {icon: 2});
                } else {
                    layer.msg(res.msg);
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            }, 'json');
        });
    }
</script>


</body>
</html>