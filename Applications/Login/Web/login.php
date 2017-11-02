<?php

use GatewayClient\Gateway;

require_once './../../../vendor/autoload.php';
/**
 * @filename login.php
 * @touch 2017/11/2 18:35
 * @author lele.wang <lele.wang@raiing.com>
 * @license: https://www.wanglele.cc/license/1_0.txt
 * @version 1.0.0
 * @copyright (c) 2017, lele.wang
 */
/**
 * 登录处理页面
 * 用户通过APP/微信扫描完二维码后跳转过来
 * APP扫描完成后，会把在当前终端登录设备的登录令牌附加在url后面一起传递过来（记得加密）
 */

// 首先应该检查 登录令牌
// 根据登录令牌获取 已登录的用户信息

// 模拟用户数据
$user_info = [
    'token' => 'abc123',
    'user_id' => 1,
    'user_name' => 'lele.wang',
 ];

Gateway::$registerAddress = '127.0.0.1:1238';

$client_id = $_GET['client_id'];

if(isset($_POST['doSubmit'])){
    // 验证身份当前终端身份

    // 生成web临时登录令牌
    $tmp_token = 'tmp_aaaaaaaaaa';

    // 将临时登录令牌与用户信息绑定存储数据库

    // 给网页端发送
    $message = [
        'type' => 'login_success',
        'url' => 'set_login_status.php?token='.$tmp_token,
    ];
    Gateway::sendToClient($client_id, json_encode($message));

}else{
    // 给网页端发送 扫描成功的状态
    $message = [
        'type' => 'scan_code_success'
    ];
    Gateway::sendToClient($client_id, json_encode($message));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>扫码登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
<div class="container">
    <form method="post" action="">
    <div class="panel panel-default" style="width:350px;" >
        <div class="panel-heading">确认是否登录</div>
        <div class="panel-body">
            <p>当前登录用户: <?php echo $user_info['user_name']; ?> </p>
            <button type="submit" name="doSubmit" class="btn btn-success btn-block btn-lg">登录</button>
            <button type="button" class="btn btn-default btn-block btn-lg">取消</button>
        </div>
    </div>
    </form>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function cancel(){
        window.opener=null;
        window.open('','_self');
        window.close();
    }
</script>

</body>
</html>
