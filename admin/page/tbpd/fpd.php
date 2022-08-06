<?php
function pd1()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd1)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd2()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd2)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd3()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd3)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd4()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd4)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd5()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd5)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd6()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd6)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd7()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd7)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd8()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd8)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd9()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd9)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd10()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd10)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
function pd11()
{
    include("../../config.php");
    $sql5 = "SELECT SUM(tb_sales.pd1),SUM(tb_sales.pd2),SUM(tb_sales.pd3),SUM(tb_sales.pd4),SUM(tb_sales.pd5),SUM(tb_sales.pd6),SUM(tb_sales.pd7),SUM(tb_sales.pd8),SUM(tb_sales.pd9),SUM(tb_sales.pd10),SUM(tb_sales.pd11),SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
    $qr5 = mysqli_query($conn, $sql5);

    $arr1 = [];
    foreach ($qr5 as $row) {
        array_push($arr1, $row["SUM(tb_sales.pd11)"]);
    }
    $n = 0;
    while ($n < 10) {
        $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
        $a12[] = number_format($a);
        array_push($arr1, $a);

        //echo ($arr1[$n] . "+" . $arr1[$n + 1] . "+" . $arr1[$n + 2]) . "/ 3" . " = " . $a . "<br>";
        $n++;
    }
    return $a12;
}
