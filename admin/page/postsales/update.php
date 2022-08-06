<?php
session_start();
include("../../config.php");
$sql = "SELECT * FROM `tb_user` WHERE tb_user.user = '" . $_SESSION["user"] . "' AND tb_user.pass ='" . $_SESSION["pass"]  . "' AND tb_user.status = 'Admin'";
$re = mysqli_query($conn, $sql);
$num = mysqli_num_rows($re);
$row = mysqli_fetch_assoc($re);
if ($num > 0) {
    $_SESSION["status"] = $row["status"];
} else {
    header('Location: ../../index.php?error=1');
    exit;
}

if (isset($_POST["submit"])) {
    $arr = [
        $_POST["txt1"],
        $_POST["txt2"],
        $_POST["txt3"],
        $_POST["txt4"],
        $_POST["txt5"],
        $_POST["txt6"],
        $_POST["txt7"],
        $_POST["txt8"],
        $_POST["txt9"],
        $_POST["txt10"],
        $_POST["txt11"],
        $_POST["txt12"],
        $_POST["txt14"],
        $_POST["txt15"],
        $_POST["txt16"]
    ];

    $sql1 = "UPDATE `tb_sales` SET `date` = '" . $arr[11] . "' , `sex` = '" . $arr[13] . "', `pd1` = '" . $arr[0] . "', `pd2` = '" . $arr[1] . "', `pd3` = '" . $arr[2] . "', `pd4` = '" . $arr[3] . "', `pd5` = '" . $arr[4] . "',
     `pd6` = '" . $arr[5] . "', `pd7` = '" . $arr[6] . "', `pd8` = '" . $arr[7] . "', `pd9` = '" . $arr[8] . "', `pd10` = '" . $arr[9] . "', `pd11` = '" . $arr[10] . "', `sales` = '" . $arr[12] . "' WHERE `tb_sales`.`id` ='" . $arr[14] . "' ;";
    $re1 = mysqli_query($conn, $sql1);

    if ($re1) {
        header('Location: ../page1.php?up=0');
        exit;
    } else {
        header('Location: ../page1.php?up=1');
        exit;
    }
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
    <link rel="icon" type="image/x-icon" href="../../img/icon.png">
</head>

<style>
    .bg {
        /* The image used */
        background-image: url("../../img/bg1.jpg");

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
                        <a class="nav-link " aria-current="page" href="../home.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg>
                            หน้าเเรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../page1.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z" />
                            </svg>
                            จัดการข้อมูลยอดขาย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../page2.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                            </svg>
                            จัดการข้อมูลพยากรณ์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../page3.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                            </svg>
                            จัดการข้อมูลสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../../index.php?out=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            </svg>
                            ออกจากระบบ</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="row">
                        <div class="col-auto">
                            <img src="../../img/<?php echo $_SESSION["img"]  ?>" alt="" class="rounded-circle " style="width: 5rem; height:2.7rem ;">
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
    

    <div class="container">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == 0) {
        ?>
                <div class="row mt-3 animate__animated animate__fadeInDown">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            ลบข้อมูลสำเร็จ
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>
                </div>
            <?php
            } elseif ($_GET["error"] == 1) {
            ?>
                <div class="row mt-3 animate__animated animate__fadeInDown">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center " role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                เข้าสู่ระบบไม่สำเร็จ
                            </div>

                        </div>
                    </div>
                </div>
        <?php
            }
        }

        ?>
        <form action="update.php" method="post" name="myform" class="needs-validation" novalidate>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            จัดการข้อมูลยอดขาย
                        </div>
                        <div class="card-body">

                            <div class="col-10 mx-auto ">
                                <div class="card">
                                    <div class="card-header">
                                        เเก้ไขข้อมูล
                                    </div>
                                    <div class="card-body ">
                                        <?php
                                        if (isset($_GET["id"])) {
                                            if ($_GET["id"]) {
                                                $id = $_GET["id"];
                                                $sql1 = "SELECT * FROM `tb_sales` WHERE tb_sales.id=" . $id;
                                                $re1 = mysqli_query($conn, $sql1);
                                                $out = mysqli_fetch_assoc($re1);

                                        ?>
                                                <div class="col-12 mx-auto">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input type="hidden" name="txt16" id="txt16" value="<?php echo $out["id"]; ?>">
                                                            <div class="mb-3">
                                                                <label for="txt12">วัน/เดือน/ปี</label>
                                                                <input type="date" onClick="this.select(); " name="txt12" id="txt12" class="form-control form-control-sm  text-center" value="<?php echo $out["date"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt15">เพศ</label>
                                                                <select name="txt15" id="txt15" class="form-select form-select-sm text-center" required>
                                                                    <?php if ($out["sex"] == "ช") {
                                                                    ?>
                                                                        <option value="ช" selected>ชาย</option>
                                                                        <option value="ญ">หญิง</option>
                                                                    <?php

                                                                    } else {
                                                                    ?>
                                                                        <option value="ญ" selected>หญิง</option>
                                                                        <option value="ช">ชาย</option>

                                                                    <?php
                                                                    } ?>


                                                                </select>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt1">หมูบด 5 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt1" id="txt1" class="form-control form-control-sm  text-center" value="<?php echo $out["pd1"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt2">หมูชิ้นติดมัน 5 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt2" id="txt2" class="form-control form-control-sm  text-center" value="<?php echo $out["pd2"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt3">ไก่หั่น 20 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt3" id="txt3" class="form-control form-control-sm  text-center" value="<?php echo $out["pd3"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt4">ไก่หั่น 35 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt4" id="txt4" class="form-control form-control-sm  text-center" value="<?php echo $out["pd4"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt5">ไก่ทอด 30 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt5" id="txt5" class="form-control form-control-sm  text-center" value="<?php echo $out["pd5"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="txt6">หมูทอดงา 20 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt6" id="txt6" class="form-control form-control-sm  text-center" value="<?php echo $out["pd6"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt7">หมูทอดงา 35 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt7" id="txt7" class="form-control form-control-sm  text-center" value="<?php echo $out["pd7"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt8">หมูฝอย 20 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt8" id="txt8" class="form-control form-control-sm  text-center" value="<?php echo $out["pd8"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt9">หมูฝอย 30 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt9" id="txt9" class="form-control form-control-sm  text-center" value="<?php echo $out["pd9"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt10">ข้าวเหนียว 5 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt10" id="txt10" class="form-control form-control-sm  text-center" value="<?php echo $out["pd10"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="txt11">ไก่ pop 20 ฿</label>
                                                                <input type="number" onClick="this.select();" name="txt11" id="txt11" class="form-control form-control-sm  text-center" value="<?php echo $out["pd11"]; ?>" required>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="txt14" id="txt14" value="<?php echo $out["sales"]; ?>">
                                                            <div class="mb-3">
                                                                <label for="txt13">รวมทั้งหมด</label>
                                                                <input type="number" onClick="this.select();" name="txt13" id="txt13" class="form-control form-control-sm  text-center" value="<?php echo $out["sales"]; ?>" required disabled>
                                                                <div class="invalid-feedback text-center">
                                                                    กรุณาใส่ข้อมูลให้ถูกต้อง
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <a href="../page1.php"><button type="button" class="btn btn-sm btn-primary " style="width: 10rem;">Back</button></a>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {

                                    $("#pdf").click(function() {
                                        var a = $("#d1").val();
                                        var b = $("#d2").val();
                                        window.location.href = "pdf.php?id=1&d1=" + a + "&d2=" + b;
                                    });

                                 
                                    $("#txt1").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];

                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt2").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt3").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt4").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt5").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt6").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt7").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt8").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt9").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt10").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                    $("#txt11").change(function() {
                                        var txt1 = [
                                            $("#txt1").val() * 5,
                                            $("#txt2").val() * 5,
                                            $("#txt3").val() * 20,
                                            $("#txt4").val() * 35,
                                            $("#txt5").val() * 30,
                                            $("#txt6").val() * 20,
                                            $("#txt7").val() * 35,
                                            $("#txt8").val() * 20,
                                            $("#txt9").val() * 30,
                                            $("#txt10").val() * 5,
                                            $("#txt11").val() * 20,
                                        ];
                                        var sum = txt1[0] + txt1[1] + txt1[2] + txt1[3] + txt1[4] + txt1[5] + txt1[6] + txt1[7] + txt1[8] + txt1[9] + txt1[10];
                                        $("#txt14").val(sum);
                                        $("#txt13").val(sum);
                                    });
                                });
                            </script>
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict'

                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.querySelectorAll('.needs-validation')

                                    // Loop over them and prevent submission
                                    Array.prototype.slice.call(forms)
                                        .forEach(function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (!form.checkValidity()) {
                                                    event.preventDefault()
                                                    event.stopPropagation()
                                                }

                                                form.classList.add('was-validated')
                                            }, false)
                                        })
                                })()
                            </script>

                        </div>
                        <div class="card-footer">
                            <h6 class="text-center">By PakutSingJawala</h6>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
<br>

</html>