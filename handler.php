<?php
$startTime = microtime(true);
session_start();

if (isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R'])) {
    $X = $_GET['X'];
    $Y = $_GET['Y'];
    $R = $_GET['R'];

    if (is_numeric($Y) && $Y <= 3 && $Y >= -5 && in_array($X, array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2)) && in_array($R, array(1, 2, 3, 4, 5))) {
        if (isInCircle($X, $Y, $R) || isInRectangle($X, $Y, $R) || isInTriangle($X, $Y, $R)) {
            $message = "Входит в область";
        } else $message = "Вне области";

        date_default_timezone_set('Europe/Moscow');
        $endTime = microtime(true);
        $executionTime = round($endTime - $startTime, 6);
        $currentTime = date('d.m.y H:i:s');

        $row = "<tr><td>$X</td><td>$Y</td><td>$R</td><td>$message</td><td>$currentTime</td><td>$executionTime</td></tr>";
        if (isset($_SESSION['rows']))
        {
            $_SESSION['rows'][] = $row;
        }
        else
        {
            $_SESSION['rows'] = array($row);
        }
        header("location: handler.php");

    }

    else
    {
        echo "Ошибка в формате введённых данных! Используйте <a href='handler.php'>форму</a>.</br>";
    }
}
else
{
    echo "Заполните <a href='handler.php'>форму</a>!";
}

function isInCircle($X, $Y, $R)
        {
    return (pow($X, 2) + pow($Y, 2) <= pow($R, 2) && ($Y >= 0) && ($X <= 0));
        }

function isInRectangle($X, $Y, $R)
        {
    return (($X >= 0) && ($Y >= 0) && ($X <= $R) && ($Y <= $R / 2));
        }

function isInTriangle($X, $Y, $R)
        {
    return (($X <= 0) && ($Y <= 0) && ($Y >= $X - $R / 2));
        }
