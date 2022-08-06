<?php

require('../config.php');
require('../fpdf184/fpdf.php');
date_default_timezone_set('Asia/Bangkok');
session_start();

if (isset($_GET['id'])) {
    if ($_GET["id"] == 1) {
        ob_end_clean();
        ob_start();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo

                // Arial bold 15
                $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
                $this->SetFont('THSarabun Bold', '', 16);



                // Move to the right
                $this->Cell(65);
                // Title
                $this->Cell(60, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลยอดขาย'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
                $this->SetFillColor(255, 255, 255);
                $this->SetDrawColor(0, 0, 0);

                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
                $this->Ln();

                $this->Cell(25);

                $this->Cell(70, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
                $this->Cell(70, 10, iconv('UTF-8', 'cp874', 'ยอดขาย'), 1, 0, 'C', true);

                $this->Ln();
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 14);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลยอดขาย';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);



        if ($_GET["d1"] == "" || $_GET["d2"] == "") {
            $sql = "SELECT SUM(tb_sales.sales),tb_sales.date FROM `tb_sales` GROUP BY tb_sales.date;";
        } else {
            $sql = "SELECT SUM(tb_sales.sales),tb_sales.date FROM `tb_sales` WHERE tb_sales.date BETWEEN '" . $_GET["d1"] . "' AND '" . $_GET["d2"] . "' GROUP BY tb_sales.date;";
        }

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);

        $re = mysqli_query($conn, $sql);

        foreach ($re as $row) {
            $date = date_create($row["date"]);
            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);
            $pdf->Cell(25);

            $pdf->Cell(70, 10, iconv('UTF-8', 'cp874', date_format($date, "d/m/Y")), 1, 0, 'C', true);
            $pdf->Cell(70, 10, iconv('UTF-8', 'cp874', number_format($row["SUM(tb_sales.sales)"])), 1, 0, 'C', true);
            $pdf->Ln();
        }



        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 2) {
        ob_end_clean();
        ob_start();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo

                // Arial bold 15
                $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
                $this->SetFont('THSarabun Bold', '', 16);



                // Move to the right
                $this->Cell(65);
                // Title
                $this->Cell(60, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลสมาชิก'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
                $this->Cell(25);

                $this->Cell(70, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
                $this->Cell(70, 10, iconv('UTF-8', 'cp874', 'ยอดขาย'), 1, 0, 'C', true);

                $this->Ln();
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 14);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลสมาชิก';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);



        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);

        $pdf->Ln();




        $pdf->Cell(30);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'รหัส'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ผู้ใช้'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'รหัสผ่าน'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ชื่อสมาชิก'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ตำเเหน่ง'), 1, 0, 'C', true);

        $pdf->Ln();
        $sql = "SELECT * FROM `tb_user`";

        $re = mysqli_query($conn, $sql);

        foreach ($re as $k => $row) {
            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);
            $pdf->Cell(30);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $row["user"]), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $row["pass"]), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $row["name"]), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $row["status"]), 1, 0, 'C', true);
            $pdf->Ln();
        }



        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 3) {
        ob_end_clean();
        ob_start();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo

                // Arial bold 15
                $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
                $this->SetFont('THSarabun Bold', '', 16);



                // Move to the right
                $this->Cell(65);
                // Title
                $this->Cell(80, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายวัน)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 14);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายวัน)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(20);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'ยอดขายที่พยากรณ์'), 1, 0, 'C', true);
        $pdf->Cell(40, 10, iconv('UTF-8', 'cp874', 'สภาพอากาศ'), 1, 0, 'C', true);
        $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', 'องศา'), 1, 0, 'C', true);

        $pdf->Ln();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://data.tmd.go.th/nwpapi/v1/forecast/location/daily/place?province=กาญจนบุรี&fields=tc,rain,cond&duration=10",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImRkZTQzZGU2Yjc2MWZlM2FjZWQ1YzViNmU1NmNjOTlmMDEwOWNlNzFjYzdlMmViMDNhYjY3Njg3NzVlZTIwOGE5OTVlYTJjMmVjMDA1YjU1In0.eyJhdWQiOiIyIiwianRpIjoiZGRlNDNkZTZiNzYxZmUzYWNlZDVjNWI2ZTU2Y2M5OWYwMTA5Y2U3MWNjN2UyZWIwM2FiNjc2ODc3NWVlMjA4YTk5NWVhMmMyZWMwMDViNTUiLCJpYXQiOjE2MjczODI5MTMsIm5iZiI6MTYyNzM4MjkxMywiZXhwIjoxNjU4OTE4OTEzLCJzdWIiOiIxNTQ2Iiwic2NvcGVzIjpbXX0.VojmIoh4n_OnPH191uB1sq9M_4HSn5L-RaftO-xoZ-RcT2L04ia61EW5uZYdg713gGHbhsldvHdr85aE40hHFkM1hmHiDLW5QKDQTGqi-rMsLVyTT38FYDCB_-2G0KqZX1M46lzM6VkNpZHyhEclyWq634veK0ILECGUvqMG_XbD4F-oXDjqKFfeclz_FintXlp4RXlCje1GPFYQoResTlmmZhmImcDEbG19TZhZ2QuYy1RbaaspljGQEN_v98p_ujas2C08LvgehQT-qg-6Q_uXw4tY4i0CVK2oIjE22Yj9a1dDAhZ6tmRXFD5UAs8za9E4Dn7r44MDNOobDayjfdObu7himJmsMIL7SdNbEuyWQHKeDTy5BLo1Y4U9nhVqXKxxyqlDsiqrXUS01RagEf59epxQzAq6oWGp68Q0GgzWnrhu3SZDbt2KYlIVj_YoZW4j08Puz8XnbGtcHS22rcfJfVuSHv24mfhTkOEX-uDCuO2S6-a4P3rjHvKCxMkk34iLnD3GsYkmLKnZMlk4NpVLr_pL_2vCJBcRkGAeKcB9FINbeXB5tlh40O8GiFKs5EYOO4JL-B6dtXsNx38FB02TcXld68i3JWafkCV81MKbMfkot7sAlCYZhOhkxDC5dJHMFLeNxnbQ2f5DoAMfjHfVZDNRnlJj0pGhadlXQ6A",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);


        curl_close($curl);
        $jsde = json_decode($response);


        $province = $jsde->WeatherForecasts[0]->location->province;

        $arr = array(
            1 => "ท้องฟ้าแจ่มใส (Clear)",
            2 => "มีเมฆบางส่วน (Partly cloudy)",
            3 => "เมฆเป็นส่วนมาก (Cloudy)",
            4 => "มีเมฆมาก (Overcast)",
            5 => "ฝนตกเล็กน้อย (Light rain)",
            6 => "ฝนปานกลาง (Moderate rain)",
            7 => "ฝนตกหนัก (Heavy rain)",
            8 => "ฝนฟ้าคะนอง (Thunderstorm)",
            9 => "อากาศหนาวจัด (Very cold)",
            10 => "อากาศหนาว (Cold)",
            11 => "อากาศเย็น (Cool)",
            12 => "อากาศร้อนจัด (Very hot)"
        );

        $sql = "SELECT SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";

        $re = mysqli_query($conn, $sql);
        $arr1 = [];
        foreach ($re as $row) {
            array_push($arr1, $row["SUM(tb_sales.sales)"]);
        }
        $n = 0;
        while ($n < 10) {
            $a = ($arr1[$n] + $arr1[$n + 1] + $arr1[$n + 2]) / 3;
            $a12[] = $a;
            array_push($arr1, $a);

            //echo ($arr[$n] . "+" . $arr[$n + 1] . "+" . $arr[$n + 2]) . "/ 3" . " = " . $a . "<br>";
            $n++;
        }
        foreach ($jsde->WeatherForecasts[0]->forecasts as $k => $a) {
            $date = date_create($a->time);
            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);
            $pdf->Cell(20);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', date_format($date, "d/m/Y")), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', number_format($a12[$k]) . " บาท"), 1, 0, 'C', true);
            $pdf->Cell(40, 10, iconv('UTF-8', 'cp874', $arr[$a->data->cond]), 1, 0, 'C', true);
            $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $a->data->tc), 1, 0, 'C', true);
            $pdf->Ln();
        }
        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 4) {
        ob_end_clean();
        ob_start();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo

                // Arial bold 15
                $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
                $this->SetFont('THSarabun Bold', '', 16);



                // Move to the right
                $this->Cell(65);
                // Title
                $this->Cell(80, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายเดือน)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 14);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายวัน)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(25);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', 'เดือน'), 1, 0, 'C', true);
        $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', 'ยอดขายที่พยากรณ์'), 1, 0, 'C', true);


        $pdf->Ln();

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
        $m = array(
            "มกราคม ",
            "กุมภาพันธ์",
            "มีนาคม",
            "เมษายน",
            "พฤษภาคม",
            "มิถุนายน",
            "กรกฎาคม",
            "สิงหาคม",
            "กันยายน",
            "ตุลาคม",
            "พฤศจิกายน",
            "ธันวาคม",
        );

        foreach ($m as $k => $a1) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);
            $pdf->Cell(25);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', $a1), 1, 0, 'C', true);
            $pdf->Cell(50, 10, iconv('UTF-8', 'cp874', number_format($arr[$k]) . " บาท"), 1, 0, 'C', true);

            $pdf->Ln();
        }
        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 5) {

        ob_end_clean();
        ob_start();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo

                // Arial bold 15
                $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
                $this->SetFont('THSarabun Bold', '', 16);



                // Move to the right
                $this->Cell(65);
                // Title
                $this->Cell(80, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายปี)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 14);
                // Page number
                $this->Ln(5);
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลยอดขายที่พยากรณ์ (รายวัน)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(20);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ปี'), 1, 0, 'C', true);
        $pdf->Cell(40, 10, iconv('UTF-8', 'cp874', 'ยอดขายที่พยากรณ์'), 1, 0, 'C', true);


        $pdf->Ln();
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
        //$Y = ($A + ($B * 6));

        foreach (gety() as $r) {
            $s[] = $r;
        }
        $sql3 = "SELECT YEAR(tb_sales.date) FROM `tb_sales`GROUP BY YEAR(tb_sales.date) ORDER BY tb_sales.date DESC LIMIT 1;";
        $qr = mysqli_query($conn, $sql3);
        $ss = mysqli_fetch_assoc($qr);
        $max = intval($ss["YEAR(tb_sales.date)"]);

        for ($n = 1; $n <= 5; $n++) {
            $dx[] =  $max++;
        }

        //$num = 6;
        $num = count(x()) + 1;
        for ($n1 = 1; $n1 <= 5; $n1++) {
            $dx1[] = ($A + ($B * $num));
            $num++;
        }
        foreach ($dx as $k3 => $a3) {
            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);
            $pdf->Cell(20);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k3 + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $a3), 1, 0, 'C', true);
            $pdf->Cell(40, 10, iconv('UTF-8', 'cp874', number_format($dx1[$k3]) . " บาท"), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    }
}
