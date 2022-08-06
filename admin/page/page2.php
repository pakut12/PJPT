<?php
session_start();
include("../config.php");
$sql = "SELECT * FROM `tb_user` WHERE tb_user.user = '" . $_SESSION["user"] . "' AND tb_user.pass ='" . $_SESSION["pass"]  . "' AND tb_user.status = 'Admin' ";
$re = mysqli_query($conn, $sql);
$num = mysqli_num_rows($re);
$row = mysqli_fetch_assoc($re);
if ($num > 0) {
    $_SESSION["status"] = $row["status"];
} else {
    header('Location: ../index.php?error=1');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ระบบพยากรณ์ยอดขาย</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/icon.png">
</head>

<style>
    .bg {
        /* The image used */
        background-image: url("../img/bg1.jpg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>


<script type="text/javascript">
    //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
    $(function() {
        //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
        $('#myTable1').dataTable();
        $('#myTable2').dataTable();
        $('#myTable3').dataTable();
        $('#myTable4').dataTable();
    });
    $(document).ready(function() {
        $('#pdf1').click(function() {
            window.location.href = "pdf.php?id=3&d1=&d2=";
        });
        $('#pdf2').click(function() {
            window.location.href = "pdf.php?id=4&d1=&d2=";
        });
        $('#pdf3').click(function() {
            window.location.href = "pdf.php?id=5&d1=&d2=";
        });


        $('#all').click(function() {
            window.location.href = "tbpd/pdf.php?id=1";
        });
        $('#pd1').click(function() {
            window.location.href = "tbpd/pdf.php?id=2";
        });
        $('#pd2').click(function() {
            window.location.href = "tbpd/pdf.php?id=3";
        });
        $('#pd3').click(function() {
            window.location.href = "tbpd/pdf.php?id=4";
        });
        $('#pd4').click(function() {
            window.location.href = "tbpd/pdf.php?id=5";
        });
        $('#pd5').click(function() {
            window.location.href = "tbpd/pdf.php?id=6";
        });
        $('#pd6').click(function() {
            window.location.href = "tbpd/pdf.php?id=7";
        });
        $('#pd7').click(function() {
            window.location.href = "tbpd/pdf.php?id=8";
        });
        $('#pd8').click(function() {
            window.location.href = "tbpd/pdf.php?id=9";
        });
        $('#pd9').click(function() {
            window.location.href = "tbpd/pdf.php?id=10";
        });
        $('#pd10').click(function() {
            window.location.href = "tbpd/pdf1.php?id=1";
        });
        $('#pd11').click(function() {
            window.location.href = "pdf2.php?id=1";
        });
    });
</script>

<body style="font-family: 'Kanit', sans-serif;" class="bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบพยากรณ์ยอดขาย</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg>
                            หน้าเเรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="page1.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z" />
                            </svg>
                            จัดการข้อมูลยอดขาย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="page2.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                            </svg>
                            จัดการข้อมูลพยากรณ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="page3.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                            </svg>
                            จัดการข้อมูลสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../index.php?out=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            </svg>
                            ออกจากระบบ</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="row">
                        <div class="col-auto">
                            <img src="../img/<?php echo $_SESSION["img"]  ?>" alt="" class="rounded-circle " style="width: 5rem; height:2.7rem ;">
                        </div>
                        <div class="col-auto">
                            <div class="text-dark h6">Name : <?php echo $_SESSION["name"] ?> <br>
                                Status : <?php echo $_SESSION["status"] ?> <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </nav>
    <br><br><br>
    <form action="page2.php" method="POST" name="myform">
        <div class="container mt-3">
            <div class="card mt-5 shadow-lg">
                <div class="card-header text-center">
                    จัดการข้อมูลพยากรณ์
                </div>
                <div class="card-body">

                    <div class="card">
                        <div class="card-header">
                            จัดการข้อมูลพยากรณ์ (รายการเมนู)
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-end">ค้นหาเมนู : </div>
                                </div>
                                <div class="col-4">
                                    <select name="txt1" id="txt1" class="form-select form-select-sm">
                                        <option value="">ทั้งหมด</option>
                                        <option value="pd1">หมู</option>
                                        <option value="pd2">ไก่</option>
                                        <option value="pd3">ข้าวเหนียว</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm btn-success" type="submit" name="submit"><i class="bi bi-search"></i> ค้นหา</button>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST["submit"])) {
                                if ($_POST["txt1"] == "") {
                                    include("tbpd/all.php");
                                } elseif ($_POST["txt1"] == "pd1") {
                                    include("tbpd/pd1.php");
                                } elseif ($_POST["txt1"] == "pd2") {
                                    include("tbpd/pd2.php");
                                } elseif ($_POST["txt1"] == "pd3") {
                                    include("tbpd/pd3.php");
                                } elseif ($_POST["txt1"] == "pd4") {
                                    include("tbpd/pd4.php");
                                } elseif ($_POST["txt1"] == "pd5") {
                                    include("tbpd/pd5.php");
                                } elseif ($_POST["txt1"] == "pd6") {
                                    include("tbpd/pd6.php");
                                } elseif ($_POST["txt1"] == "pd7") {
                                    include("tbpd/pd7.php");
                                } elseif ($_POST["txt1"] == "pd8") {
                                    include("tbpd/pd8.php");
                                } elseif ($_POST["txt1"] == "pd9") {
                                    include("tbpd/pd9.php");
                                } elseif ($_POST["txt1"] == "pd10") {
                                    include("tbpd/pd10.php");
                                } elseif ($_POST["txt1"] == "pd11") {
                                    include("tbpd/pd11.php");
                                }
                            } else {
                                include("tbpd/all.php");
                            }

                            ?>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header ">
                            จัดการข้อมูลพยากรณ์ (รายวัน)
                        </div>
                        <div class="card-body">
                            <div class="h3 text-center mt-3">จัดการข้อมูลพยากรณ์ (รายวัน)</div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-sm-6 text-end"><button type="button" id="pdf1" class="btn btn-sm btn-success" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
                            </div>
                            <br>
                            <?php

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


                            ?>
                            <div class="col-12">
                                <div class="container">
                                    <div class="col-12">


                                        <table class="table mx-auto table-bordered table-sm text-center" id="myTable1">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>วันที่</th>
                                                    <th>ยอดขายที่พยากรณ์</th>
                                                    <th>สภาพอากาศ</th>
                                                    <th>°C</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $sql1 = "SELECT SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY tb_sales.date DESC LIMIT 3;";
                                            $qr1 = mysqli_query($conn, $sql1);

                                            $arr1 = [];
                                            foreach ($qr1 as $row) {
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
                                                echo '<tr>';
                                                echo '<td>' . ($k + 1) . '</td>';
                                                echo '<td>' . date_format($date, "d/m/Y") . '</td>';
                                                echo '<td>' . number_format($a12[$k]) . ' บาท  </td>';
                                                echo '<td>' . $arr[$a->data->cond] . '</td>';
                                                echo '<td>' . $a->data->tc . '</td>';
                                                echo '</tr>';
                                            }

                                            ?>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="card mt-3">
                        <div class="card-header ">
                            จัดการข้อมูลพยากรณ์ (รายเดือน)
                        </div>
                        <div class="card-body">
                            <div class="h3 text-center mt-3">จัดการข้อมูลพยากรณ์ (รายเดือน)</div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-sm-6 text-end"><button type="button" id="pdf2" class="btn btn-sm btn-success" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
                            </div>
                            <br>

                            <?php
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
                            ?>
                            <div class="col-12">
                                <div class="container">
                                    <div class="col-12">


                                        <table class="table mx-auto table-bordered table-sm text-center">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>เดือน</th>
                                                    <th>ยอดขายที่พยากรณ์</th>

                                                </tr>
                                            </thead>

                                            <?php

                                            foreach ($m as $k => $a1) {
                                                echo '<tr>';
                                                echo '<td>' . ($k + 1) . '</td>';
                                                echo '<td>' . $a1 . '</td>';
                                                echo '<td>' . number_format($arr[$k]) . ' บาท </td>';
                                                echo '</tr>';
                                            }


                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted text-center">
                    By PakutSingJawala
                </div>
            </div>

    </form>



</body>
<br>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</html>