<?php
header("Cache-Control: no-cache, must-revalidate");
// Прошедшая дата
header("Expires: Mon, 1 Sep 2008 07:30:00 GMT");

$operators = array("+", "-", "*", "/", "^");
$nums = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");


$str = $_POST["log"];
$str = str_replace(" ", "", $str);

$num1 = "";
$num2 = "";

function ParseText($str, $nums)
{
    $temp = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if (array_search($str[$i], $nums) == true || $str[$i] == "0") {
            $temp .= $str[$i];
        }
    }

    return $temp;
}

switch ($str) {

    case str_contains($str, "+"):
        $b = false;
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] != "+" && $b == false)
                $num1 .= $str[$i];
            else {
                $b = true;
            }

            if ($b == true) {
                $num2 .= $str[$i];
            }
        }

        echo (float) $num1 + (float) $num2;
        break;

    case str_contains($str, "-"):
        $b = false;
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] != "-" && $b == false)
                $num1 .= $str[$i];
            else {
                $b = true;
            }

            if ($b == true) {
                $num2 .= $str[$i];
            }
        }

        echo (float) $num1 + (float) $num2;
        break;

    case str_contains($str, "*"):
        $b = false;
        for ($i = 0; $i < strlen($str); $i++) {

            if ($b == true) {
                $num2 .= $str[$i];
            }

            if ($str[$i] != "*" && $b == false)
                $num1 .= $str[$i];
            else {
                $b = true;
            }
        }

        echo (float) $num1 * (float) $num2;
        break;

    case str_contains($str, "/"):
        $b = false;
        for ($i = 0; $i < strlen($str); $i++) {

            if ($b == true) {
                $num2 .= $str[$i];
            }

            if ($str[$i] != "/" && $b == false)
                $num1 .= $str[$i];
            else {
                $b = true;
            }
        }

        echo (float) $num1 / (float) $num2;
        break;

    case str_contains($str, "^"):
        $b = false;
        for ($i = 0; $i < strlen($str); $i++) {

            if ($b == true) {
                $num2 .= $str[$i];
            }

            if ($str[$i] != "^" && $b == false)
                $num1 .= $str[$i];
            else {
                $b = true;
            }
        }

        echo pow((float) $num1,  (float) $num2);
        break;

    case str_contains($str, "sin"):
        $num1 = deg2rad((float) ParseText($str, $nums));
        echo sin($num1);
        break;

    case str_contains($str, "cos"):
        $num1 = deg2rad((float) ParseText($str, $nums));
        echo cos($num1);
        break;

    case str_contains($str, "ctg"):
        $num1 = deg2rad((float) ParseText($str, $nums));
        if (tan($num1) == 0) {
            echo "DivisionByZeroError or null argument";
            break;
        }
        echo 1 / tan($num1);
        break;

    case str_contains($str, "tg"):
        $num1 = deg2rad((float) ParseText($str, $nums));
        if (tan($num1) == 0) {
            echo "DivisionByZeroError or null argument";
            break;
        }
        echo tan($num1);
        break;
    default:
        echo "Error";
        break;
}
/*
//получение параметра log
$q = $_POST["log"];
// Инициализация массива названий
$login[] = "aazc";
$login[] = "bblk";
$login[] = "cclk";
//поиск соответствий из массива если длина log > 0
$antvort = "";
if (strlen($q ) > 0) {
    for ($i = 0; $i < count($login); $i++) {
        if (strtolower($q ) == strtolower(substr($login[$i], 0, strlen($q ))))
            $antvort = "УЖЕ СУЩЕСТВУЕТ";
        else    
            $antvort = "НЕ СУЩЕСТВУЕТ";
    }
}
//вывод результата
echo $antvort;
*/

        /*
            for ($i = 0; $i < strlen($str); $i++) {
                if (array_search($str[$i], $nums) == true) {
                    $num1 .= $str[$i];
                }
            }
            */