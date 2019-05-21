<?php

require_once 'src/autoloader.php';
use Grafika\Grafika; // Import package
use Grafika\Color;

header('Content-Type: text/html; charset=utf-8');
// 制定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$link = mysqli_connect($host, $user, $pass);
mysqli_select_db($link, '123');
mysqli_query($link, 'SET names UTF8');
$timezone = 'Asia/Shanghai';
date_default_timezone_set($timezone);
session_start();
$query = mysqli_query($link, 'SELECT * FROM `station` WHERE id='.$_SESSION['id']);
$result = mysqli_fetch_array($query);
//var_dump($result['passenger1']);
$editor = Grafika::createEditor(); // Create the best available editor
$station = array('秀发号', '满绩号', '暴富号', '超越号', '脱单号','暴瘦号','吃鸡号',);
$editor->open($image, 'initial.png');
$editor->text($image, '恭喜你成为第', 18, 72, 428, new Color('#D98247'), '', 0);
$editor->text($image, $_SESSION['id'], 18, 222, 428, new Color('#D98247'), '', 0);
$editor->text($image, '位搭上列车的乘客', 18, 262, 428, new Color('#D98247'), '', 0);
$editor->text($image, $result['passenger1'], 25, 173, 612, new Color('#FFFFFF'), '', 0);
$editor->text($image, $result['passenger2'], 25, 223, 612, new Color('#FFFFFF'), '', 0);
$editor->text($image, $result['passenger3'], 25, 273, 612, new Color('#FFFFFF'), '', 0);
$editor->text($image, $result['destination'], 31, 385, 485, new Color('#FFFFFF'), '', 0);
$editor->text($image, $result['comment'], 25, 175, 664, new Color('#FFFFFF'), '', 0);
$editor->text($image, $station[$_SESSION['code']], 20, 276, 486, new Color('#FFFFFF'), '', 0);
header('Content-type: image/png');
$image->blob('png');
