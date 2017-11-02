<?php
/**
 * 设置登录信息
 * @filename set_login_status.php
 * @touch 2017/11/2 19:27
 * @author lele.wang <lele.wang@raiing.com>
 * @license: https://www.wanglele.cc/license/1_0.txt
 * @version 1.0.0
 * @copyright (c) 2017, lele.wang
 */

// 0. 设置登录信息
// 1. 根据临时token 获取需要登录的用户信息
// 2. 设置用户登录标识
// 3. 跳转回到原页面

// 获取临时 token
$token = $_GET['token'];

// 验证tokne

// 获取用户信息

// 写入用户信息到session

// 跳转页面
# header('Location: http://www.example.com/');
# 这里示意一下就不跳转了
echo '登录成功';