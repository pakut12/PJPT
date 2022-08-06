<?php
session_start();
include("../config.php");
header('Content-type: application/json');

if ($_SESSION["status"] == "User" || $_SESSION["status"] == "" ) {
    header('Location: ../index.php?error=1');
    exit;
} else {
    if (isset($_GET["id"])) {
        if ($_GET["id"] == 1) {
            function test()
            {
                include("../config.php");
                function cal($a, $b, $c)
                {
                    $a = ($a + $b + $c) / 3;
                    return $a;
                }

                $sql = "SELECT SUM(tb_sales.sales),MONTH(tb_sales.date) FROM `tb_sales` WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY MONTH(tb_sales.date) ORDER BY MONTH(tb_sales.date) DESC;";
                $qr = mysqli_query($conn, $sql);

                $arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

                foreach ($qr as $k => $v) {
                    $arr[$v["MONTH(tb_sales.date)"] - 1] = $v["SUM(tb_sales.sales)"];
                }

                $n1 = 0;
                while ($n1 < count($arr)) {
                    if ($arr[$n1] !== 0) {
                        $a[] = $n1;
                    }
                    $n1++;
                }
                $max = max($a) + 1;
                $n = 0;
                $s = 3;
                foreach ($arr as $r) {
                    $arr[$max] = cal($arr[0 + $n], $arr[1 + $n], $arr[2 + $n]);
                    $arr1[] = cal($arr[0 + $n], $arr[1 + $n], $arr[2 + $n]);
                    //echo $arr[0 + $n] . "+" . $arr[1 + $n] . "+" . $arr[2 + $n] . "/ 3 = " . $arr[$max] . "\n";
                    $max++;
                    $n++;
                    $s++;
                }
                return $arr1;
            }

            $sql = "SELECT SUM(tb_sales.sales),MONTH(tb_sales.date) FROM `tb_sales` WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY MONTH(tb_sales.date) ORDER BY MONTH(tb_sales.date) DESC;";
            $qr = mysqli_query($conn, $sql);

            $arr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

            foreach ($qr as $k => $v) {
                $arr[$v["MONTH(tb_sales.date)"] - 1] = $v["SUM(tb_sales.sales)"];
            }
            $arr1 = test();
         
            $n = 2;
            $n1 = 5;
            for ($v = 0; $v < 10; $v++) {
                $arr[$n1] = $arr1[$n];
                $n1++;
                $n++;
            }
        
            for ($v = 0; $v < 12; $v++) {
                $js[] = intval($arr[$v]);
            }

            echo json_encode($js);


        } elseif ($_GET["id"] == 2) {
            function x()
            {
                include("../config.php");
                $sql = "SELECT YEAR(tb_sales.date) FROM `tb_sales`GROUP BY YEAR(tb_sales.date);";
                $q = mysqli_query($conn, $sql);
                $cout = mysqli_num_rows($q);
                $n = 1;
                while ($n <= $cout) {
                    $op[] = $n;
                    $n++;
                }
                return ($op);
            }
            function gety()
            {
                include("../config.php");
                $sql = "SELECT YEAR(tb_sales.date) FROM `tb_sales`GROUP BY YEAR(tb_sales.date);";
                $q = mysqli_query($conn, $sql);
                foreach ($q as $row) {
                    $r[] = ($row["YEAR(tb_sales.date)"]);
                }
                return $r;
            }
            function y()
            {
                include("../config.php");
                $sql = "SELECT YEAR(tb_sales.date) FROM `tb_sales`GROUP BY YEAR(tb_sales.date);";
                $q = mysqli_query($conn, $sql);
                foreach ($q as $r1) {
                    $y = $r1["YEAR(tb_sales.date)"];
                    $sql1 = "SELECT SUM(tb_sales.sales)FROM `tb_sales`WHERE YEAR(tb_sales.date) = '" . $y . "';";
                    $qr1 = mysqli_query($conn, $sql1);
                    $op = mysqli_fetch_assoc($qr1);
                    $a[] = $op["SUM(tb_sales.sales)"];
                }
                return ($a);
            }
            function xy()
            {
                $a = x();
                $b = y();

                foreach ($a as $k => $v) {
                    $c[] = $a[$k] * $b[$k];
                }
                return $c;
            }
            function x2()
            {
                $a = x();
                foreach ($a as $k => $v) {
                    $c[] = pow($v, 2);
                }
                return $c;
            }
            /*
            $x = 15;
            $y = 58.7;
            $xy = 183.6;
            $x2 = 55;
            $totel = 5;
*/

            $x = array_sum(x());
            $y = array_sum(y());
            $xy = array_sum(xy());
            $x2 = array_sum(x2());
            $totel = count(x());

            $B = ((($totel * $xy) - ($x * $y)) / (($totel * $x2) - pow($x, 2)));
            $A = ($y / $totel) - ($B * ($x / $totel));
            //   $Y = ($A + ($B * 6));

            foreach (gety() as $r) {
                $s[] = $r;
            }
            $sql3 = "SELECT YEAR(tb_sales.date) FROM `tb_sales`GROUP BY YEAR(tb_sales.date) ORDER BY tb_sales.date DESC LIMIT 1;";
            $qr = mysqli_query($conn, $sql3);
            $ss = mysqli_fetch_assoc($qr);
            $max = intval($ss["YEAR(tb_sales.date)"]);

            for ($n = 1; $n <= 5; $n++) {
                $arr1[] =  $max++;
            }

            //$num = 6;
            $num = count(x()) + 1;
            for ($n1 = 1; $n1 <= 5; $n1++) { // รับค่าปี n1
                $arr[] = ($A + ($B * $num));
                $num++;
            }


            foreach ($arr as $row) {
                $js[] = $row;
            }
            foreach ($arr1 as $row1) {
                $js1[] = $row1;
            }
            $da = array(
                "data" => $js,
                "data1" => $js1
            );

            echo json_encode($da);
        }
    }
}
