<?php
header("Content-Type:text/html;charset=utf-8");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

$sss = "<table border='1'><tr><th>url</th><th>id</th><th>hospital</th><th>name</th><th>department</th></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>孔繁智</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>李国平</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>姜琴华</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>柴秀娟</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>陈明</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>周颖</td><td>呼吸内科</td></tr><tr><td>NULL</td><td>NULL</td><td>浙江省立同德医院</td><td>徐卫华</td><td>呼吸内科</td></tr></table><br><br><br>";


echo html_entity_decode($sss, ENT_QUOTES, 'UTF-8');

?>
