<?php
/**
 * @filename code.php
 * @touch 2017/11/2 18:21
 * @author lele.wang <lele.wang@raiing.com>
 * @license: https://www.wanglele.cc/license/1_0.txt
 * @version 1.0.0
 * @copyright (c) 2017, lele.wang
 */

use Endroid\QrCode\QrCode;

require_once './../../../vendor/autoload.php';

$id = $_GET['id'];

// 二维码扫描后跳转链接
$url = 'http://127.0.0.1:8089/login.php?client_id='.$id;

$qrCode = new QrCode($url);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();