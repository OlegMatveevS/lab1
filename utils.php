<?php
$xValues = [-3, -2, -1, 0, 1, 2, 3, 4, 5];
$rValues = [1, 2, 3, 4, 5];
$yMax = 5;
$yMin = -3;

$areaImg = '<img id="areas-img" src="static/images/areas.PNG">';

function calcTimer($start, $end) {
    $startCalcTimer = explode(' ', $start);
    $endCalcTimer = explode(' ', $end);

    $calcTimerSec = $endCalcTimer[1] - $startCalcTimer[1];
    $calcTimerMsec = $endCalcTimer[0] - $startCalcTimer[0];

    if ($calcTimerSec === 0)
        return round($calcTimerMsec, 10);
    else
        return $calcTimerSec + $calcTimerMsec;
}

