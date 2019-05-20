<?php

require_once 'src/autoloader.php';
use Grafika\Grafika; // Import package
use Grafika\Color;

header('Content-Type: text/html; charset=utf-8');
$host = 'localhost';
$user = '';
$pass = '';
$link = mysqli_connect($host, $user, $pass);
mysqli_select_db($link, '123');
mysqli_query($link, 'SET names UTF8');
$timezone = 'Asia/Shanghai';
date_default_timezone_set($timezone);
session_start();
$query = mysqli_query($link, 'SELECT * FROM `station` WHERE id='.$_SESSION['id']);
$result = mysqli_fetch_array($query);
$editor = Grafika::createEditor(); // Create the best available editor
$station = array('秀发号', '满绩号', '暴富号', '超越号', '脱单号', '吃鸡号', '暴瘦号');
$editor->open($image, 'initial.jpg');
$editor->text($image, $result['passenger1'], 31, 173, 612, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
$editor->text($image, $result['passenger2'], 31, 223, 612, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
$editor->text($image, $result['passenger3'], 31, 273, 612, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
$editor->text($image, $result['destination'], 52, 385, 485, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
$editor->text($image, $result['comment'], 31, 175, 664, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
$editor->text($image, $station[$_SESSION['code']], 29, 276, 486, new Color('#FFFFFF'), 'FZHTJW.ttf', 0);
header('Content-type: image/png');
$image->blob('PNG');
