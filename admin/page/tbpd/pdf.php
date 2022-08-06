<?php
require('../../config.php');
require('../../fpdf184/fpdf.php');
require('fpd.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
if (isset($_GET["id"])) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();


        $pdf->Cell(10, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(20, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd1'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd2'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd3'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd4'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd5'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd6'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd7'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd8'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd9'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd10'), 1, 0, 'C', true);
        $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', 'pd11'), 1, 0, 'C', true);
        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);


            $pdf->Cell(10, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(20, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd1()[$k] . " ไม้"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd2()[$k] . " ไม้"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd3()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd4()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd5()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd6()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd7()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd8()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd9()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd10()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(15, 10, iconv('UTF-8', 'cp874', pd11()[$k] . " ไม้"), 1, 0, 'C', true);
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();


        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูบด 5 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูชิ้นติดมัน 5 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูทอดงา 20 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูทอดงา 35 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูฝอย 20 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'หมูฝอย 30 ฿'), 1, 0, 'C', true);
        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);


            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd1()[$k] . " ไม้"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd2()[$k] . " ไม้"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd6()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd7()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd8()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd9()[$k] . " ถุง"), 1, 0, 'C', true);
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(20);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ไก่หั่น 20 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ไก่หั่น 35 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ไก่ทอด 30 ฿'), 1, 0, 'C', true);
        $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', 'ไก่ pop 20 ฿'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(20);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd3()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd4()[$k] . " ถุง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd5()[$k] . " กล่อง"), 1, 0, 'C', true);
            $pdf->Cell(24, 10, iconv('UTF-8', 'cp874', pd11()[$k] . " ไม้"), 1, 0, 'C', true);

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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ข้าวเหนี่ยว'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd10()[$k] . " ถุง"), 1, 0, 'C', true);

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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd4'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd4()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 6) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd5'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd5()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 7) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd6'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd6()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 8) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd7'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd7()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 9) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd8'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd8()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 10) {
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
                $this->Cell(50);
                // Title
                $this->Cell(100, 10, iconv('UTF-8', 'cp874', 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)'), 1, 0, 'C');
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->AddFont('THSarabun', '', 'THSarabun.php');
                $this->SetFont('THSarabun', '', 15);
                // Page number
                $this->Cell(0, 10, iconv('UTF-8', 'cp874', 'หน้า') . $this->PageNo() . '/{nb}', 0, 0, 'C');
                $this->Ln();
                $this->Cell(170, 5, iconv('UTF-8', 'cp874', 'คำอธิบาย'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd1 = หมูบด 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd2 = หมูชิ้นติดมัน 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd3 = ไก่หั่น 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd4 = ไก่หั่น 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd5 = ไก่ทอด 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd6 = หมูทอดงา 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd7 = หมูทอดงา 35 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd8 = หมูฝอย 20 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd9 = หมูฝอย 30 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd10 = ข้าวเหนียว 5 ฿'), 0, 0, 'R', true);
                $this->Ln();
                $this->Cell(180, 5, iconv('UTF-8', 'cp874', 'pd11 = ไก่ pop 20 ฿'), 0, 0, 'R', true);
            }
        }

        // Instanciation of inherited class
        $pdf = new PDF();
        $pdf->SetXY(100, 50);
        $title = 'รายงานสรุปข้อมูลพยากรณ์ยอดขาย (รายการเมนู)';
        $pdf->SetTitle($title, true);

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $pdf->SetFont('THSarabun Bold', '', 14);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Cell(180, 5, iconv('UTF-8', 'cp874', 'ผู้พิมพ์ : ' . $_SESSION["name"]), 0, 0, 'R', true);
        $pdf->Ln();
        $pdf->Cell(180, 10, iconv('UTF-8', 'cp874', 'วันที่พิมพ์ ' . date('d/m/Y H:i:s')), 0, 0, 'R', true);
        $pdf->Ln();

        $pdf->Cell(10);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'วันที่'), 1, 0, 'C', true);
        $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', 'pd9'), 1, 0, 'C', true);

        $pdf->Ln();

        for ($n = 0; $n < 10; $n++) {
            $date = strtotime("+" . $n . " day");
            $tomorrow[] = date('d/m/Y', $date);
        }

        foreach ($tomorrow as $k => $v) {

            $pdf->AddFont('THSarabun', '', 'THSarabun.php');
            $pdf->SetFont('THSarabun', '', 14);

            $pdf->Cell(10);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $k + 1), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', $v), 1, 0, 'C', true);
            $pdf->Cell(60, 10, iconv('UTF-8', 'cp874', pd9()[$k]), 1, 0, 'C', true);

            $pdf->Ln();
        }

        $pdf->Output();
        ob_end_flush();
    } elseif ($_GET["id"] == 11) {
    }
}
