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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href='../fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='../fullcalendar/lib/main.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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
                        <a class="nav-link active" aria-current="page" href="home.php">
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
                        <a class="nav-link " aria-current="page" href="page2.php">
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
                            <div class="text-dark h6 ">Name : <?php echo $_SESSION["name"] ?> <br>
                                Status : <?php echo $_SESSION["status"] ?> <br>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card text-white bg-primary mb-3 shadow-lg" style="max-width: 18rem;">
                            <div class="card-header text-center">ยอดขายล่าสุด</div>
                            <div class="card-body">
                                <?php

                                $qr = mysqli_query($conn, "SELECT SUM(tb_sales.sales),tb_sales.date FROM `tb_sales`GROUP BY tb_sales.date  DESC;");
                                $re = mysqli_fetch_assoc($qr);
                                ?>
                                <h5 class="card-title text-center"><?php echo number_format($re["SUM(tb_sales.sales)"]); ?> บาท </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-white bg-success  mb-3 shadow-lg" style="max-width: 18rem;">
                            <div class="card-header text-center">จำนวนสมาชิก online</div>
                            <div class="card-body">
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE tb_user.online = 1 AND tb_user.status = 'User' ;");
                                ?>
                                <h5 class="card-title text-center"><?php echo number_format(mysqli_num_rows($qr)); ?> คน</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-dark bg-warning   mb-3 shadow-lg" style="max-width: 18rem;">
                            <div class="card-header text-center">จำนวนผู้ดูเเล online</div>
                            <div class="card-body">
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE tb_user.online = 1 AND tb_user.status = 'Admin' ;");
                                ?>
                                <h5 class="card-title text-center"><?php echo number_format(mysqli_num_rows($qr)); ?> คน</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-white bg-danger mb-3 shadow-lg" style="max-width: 18rem;">
                            <div class="card-header text-center">ยอดขายเดือนที่เเล้ว</div>
                            <div class="card-body">
                                <?php

                                $qr = mysqli_query($conn, "SELECT SUM(tb_sales.sales),MONTH(tb_sales.date) FROM `tb_sales` WHERE YEAR(tb_sales.date) = YEAR(CURDATE()) GROUP BY MONTH(tb_sales.date) ORDER BY MONTH(tb_sales.date) DESC LIMIT 1,1;");
                                $re = mysqli_fetch_assoc($qr);
                                ?>
                                <h5 class="card-title text-center"><?php echo number_format($re["SUM(tb_sales.sales)"]); ?> บาท </h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-lg">
            <div class="card-header text-center">
                ยินดีตอนรับ
            </div>
            <div class="card-body">

                <h4 class="card-title text-center">ร้าน เจ๊เปิ้ล หมูซิ่ง ยินดีตอนรับ</h4>
                <br>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/img2.jpg" class="d-block  img-thumbnail" alt="..." style="height: 23rem; width: 100rem;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>ร้าน เจ๊เปิ้ล หมูซิ่ง ยินดีตอนรับ</h5>
                                <p>เนื้อ นุ่ม อร่อย</p>
                            </div>
                        </div>
                        <div class="carousel-item">

                            <img src="../img/img1.jpg" class="d-block  img-thumbnail" alt="..." style="height: 20rem; width: 100rem;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>ร้าน เจ๊เปิ้ล หมูซิ่ง ยินดีตอนรับ</h5>
                                <p>ทุกไม้เด็ด</p>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <br>
                <div class="card col-11 mx-auto ">
                    <div class="card-header">
                        พยากรณ์ยอดขาย (รายวัน)
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>

                </div>
                <br>
                <div class="card col-11 mx-auto">
                    <div class="card-header">
                        พยากรณ์ยอดขาย (รายเดือน)
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" style="width: 100rem;height: 50rem;"></canvas>
                    </div>
                </div>
                <br>

            </div>
            <div class="card-footer">
                <h6 class="text-center" id="fotter">By PakutSingJawala</h6>
            </div>
        </div>
    </div>

    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var origin = window.location.origin;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                events: {
                    url: origin + "/PJPT/admin/page/celjson.php"
                },
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5'
            });

            calendar.render();
        });
    </script>
    <script>
        $(document).ready(function() {
            var origin = window.location.origin;
            console.log(origin);
            $.ajax({
                url: origin + "/PJPT/admin/page/dbjson.php?id=1",
                type: "POST",
                dataType: "json",
                success: function(data) {
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            datasets: [{
                                label: 'ยอดขาย',
                                data: data,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1,
                                datalabels: {
                                    color: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    anchor: "end",
                                    align: "top",
                                    formatter: function addCommas(value) {
                                        value += '';
                                        x = value.split('.');
                                        x1 = x[0];
                                        x2 = x.length > 1 ? '.' + x[1] : '';
                                        var rgx = /(\d+)(\d{3})/;
                                        while (rgx.test(x1)) {
                                            x1 = x1.replace(rgx, '$1' + ',' + '$2');
                                        }
                                        return x1 + x2;
                                    }
                                }
                            }]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: false // Hide legend
                            }
                        }
                    });
                }

            });

        });
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
<br>


</html>