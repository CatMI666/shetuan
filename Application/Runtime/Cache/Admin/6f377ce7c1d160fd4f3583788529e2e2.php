<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>物品修改</title>
    <script src="/shetuan/Public/admin/js/jquery.min.js"></script>
</head>
<body>
    <h1>物品修改</h1>
    <table border="2px solid">
            <td>物品名称<input type="text" value="<?php echo ($res['goodsname']); ?>" id="goodsname"></td>
            <td>物品数量<input type="text" value="<?php echo ($res['goodsnum']); ?>" id="goodsnum"></td>
    </table>
    <button id="subbtn" type="button" data-id="<?php echo ($res['goodsid']); ?>">确认提交</button>
</body>

<script>
    $('#subbtn').on('click',function () {
        var btn = $(this);
        var goodsid = btn.data('id');
        var goodsname = $('#goodsname').val();
        var goodsnum = $('#goodsnum').val();
        var param = {
            goodsid: goodsid,
            goodsname:goodsname,
            goodsnum:goodsnum,
        };
        console.log(param);
        var url = "<?php echo U('Goods/goodsmodify');?>";
        $.ajax({
            url: url,
            data: param,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                alert(data.info);
                if (data.status == 1) {
                    window.location.href= "<?php echo U('Goods/departgoods');?>"
                }
            },
            error: function () {
                alert('操作失败');
            }
        })
    })
</script>
</html>