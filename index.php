<?php
include("config.php");
session_start();

if (isset($_GET["out"])) {
    if ($_GET["out"] == 1) {
        mysqli_query($conn, "UPDATE `tb_user` SET `online` = '0' WHERE `tb_user`.`id` = " . $_SESSION["id"] . ";");
        session_destroy();
    }
} else {
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
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/icon.png">
</head>

<style>
    .bg {
        background: #006699 url('img/bg.jpg') no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        width: cover;
        height: cover;
    }
</style>

<body style="font-family: 'Kanit', sans-serif;" class="bg">

    <?php
    if (isset($_GET["error"]) == 1) {
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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    เข้าสู่ระบบไม่สำเร็จ
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            </div>
        </div>
    <?php
    } else {
    ?>


    <?php
    }
    ?>

    <form action="page/cklogin.php" method="post" name="myform" class="needs-validation" novalidate>
        <div class="container mt-5">
            <div class="card col-5 text-center mx-auto shadow-lg">
                <div class="card-header">
                    ระบบพยากรณ์ยอดขาย
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <span class="material-icons">
                                person
                            </span>
                        </span>
                        <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="txt1" id="txt1" required>
                        <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ถูกต้อง
                        </div>
                    </div>
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">
                            <span class="material-icons">
                                vpn_key
                            </span>
                        </span>
                        <input type="password" class="form-control form-control-sm" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="txt2" id="txt2" required>
                        <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ถูกต้อง
                        </div>
                    </div>

                    <div class="mb-3 text-end">
                        <a href="forgot.php">ลืมรหัสผ่าน</a>
                    </div>
                    <button type="submit" class="btn btn-success w-100 btn-sm"><i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ</button>
                    <div class="mt-3"></div>

                    <a href="register.php"> <button type="button" class="btn btn-warning w-100 btn-sm"><i class="bi bi-person-plus"></i> สมัครสมาชิก</button></a>
                    <div class="mt-3"></div>
                    <hr>
                    <a href="admin/index.php"><button type="button" class="btn btn-primary w-100 btn-sm"><i class="bi bi-person-circle"></i> Admin</button></a>
                </div>
                <div class="card-footer text-muted">
                    By PakutSingJawala
                </div>
            </div>
        </div>
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
    </form>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>