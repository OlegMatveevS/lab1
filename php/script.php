<?php
function check($x, $y, $r){
    if ((($x*$x + $y*$y) <= $r*$r/4 && $x >= 0 && $y <= 0) || ($x >= -$r && $x <= 0 && $y <= $r && $y >= 0) || ($x <= (-$y/2 + $r/2) && $y >= 0 && $x >= 0)) {
        return "<span style='color: green'>True</span>";
    } else {
        return "<span style='color: red'>False</span>";
    }
}
session_start();

date_default_timezone_set('Europe/Moscow');
$currentTime = date("H:i:s");
$start = microtime(true);

function checkArea($x, $y, $r){
    return !in_array($r, array(1, 2, 3, 4, 5)) ||  !is_double($y) || $y < -3 || ceil(($y)) > 5 || !in_array($x, array(-3, -2, -1, 0, 1, 2, 3, 4, 5));
}

$decimal = (int) $_GET['decimal'];
$x = (int) $_GET['x_set'];
$y = (float) str_replace(",", ".", $_GET['y_set']);
$r = (int) $_GET['r_set'];

if (checkArea($x, $y, $r)) {
    http_response_code(400);
    return;
}

$res = check ($x, $y, $r);
$time = microtime(true) - $start;
$s = pow(10,$decimal);

$result = array($x, intval($y * $s) / $s, $r, $res, $currentTime, $time);


if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = array();
}
array_push($_SESSION['history'], $result);
include "table.php"
?>


