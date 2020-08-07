<?php
$xValues = [-3, -2, -1, 0, 1, 2, 3, 4, 5];
$rValues = [1, 2, 3, 4, 5];
$yMax = 5;
$yMin = -3;

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

function check($x, $y, $r)
{
    $startTime = microtime();
    $result = false;
    if ($x < 0 and $y < 0) {
        $result = false;
    } elseif ($x >= 0 and $y >= 0) {
        if ($x <= $r and $y <= $r)
            $result = true;
    } elseif ($x <= 0 and $y >= 0)
        $result = pow($x, 2) + pow($y, 2) <= pow($r, 2);
    elseif ($x <= ((int)$r) / 2 and $y >= $r)
        $result = true;

    $calcTime = calcTimer($startTime, microtime());

    $_SESSION['results'][] = array(
        'x' => $x,
        'y' => $y,
        'r' => $r,
        'result' => $result,
        'calcTime' => $calcTime
    );

    return $result;
}



