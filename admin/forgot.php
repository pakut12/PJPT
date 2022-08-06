<?php
include("config.php");
session_start();
if (isset($_POST["submit"])) {
    $arr = array(
        $_POST["txt1"],
        $_POST["txt2"],
        $_POST["txt3"]
    );
    $sql = "SELECT * FROM `tb_user` WHERE tb_user.user = '" . $arr[0] . "' AND tb_user.question = '" . $arr[1] . "' AND tb_user.answer = '" . $arr[2] . "' ";
    $re = mysqli_query($conn, $sql);

    if ($re->num_rows !== 0) {
        foreach ($re as $r) {
            $_SESSION["id"] = $r["id"];
        }
        header('Location: forgot1.php?id=' . $_SESSION["id"]);
        exit;
    } else {
        echo "<script>alert('ข้อมูลไม่ถูกต้อง')</script>";
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
    <form action="forgot.php" method="post" name="myform" class="needs-validation" novalidate>
        <div class="container mt-5">
            <div class="card col-5 text-center mx-auto shadow-lg">
                <div class="card-header">
                    ลืมรหัสผ่าน
                </div>
                <div class="card-body text-start">
                    <div class="mb-3">
                        <label for="txt5">Username : </label>
                        <input type="text" class="form-control form-control-sm" id="txt1" name="txt1" required>
                        <div class="invalid-feedback text-center">
                            กรุณาใส่ข้อมูลให้ถูกต้อง
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt2">คำถาม : </label>
                        <select name="txt2" id="txt2" class="form-select form-select-sm " required>
                            <option value="" selected>โปรดเลือก</option>
                            <option value="สัตว์คุณชื่ออะไร ?">สัตว์คุณชื่ออะไร ?</option>
                            <option value="ทีมฟุตบอลที่คุณชอบคืออะไร ?">ทีมฟุตบอลที่คุณชอบคืออะไร ?</option>
                            <option value="สีที่คุณชอบคืออะไร ?">สีที่คุณชอบคืออะไร ?</option>
                        </select>
                        <div class="invalid-feedback text-center">
                            กรุณาใส่ข้อมูลให้ถูกต้อง
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt3">คำตอบ : </label>
                        <input type="text" class="form-control form-control-sm" id="txt3" name="txt3" required>
                        <div class="invalid-feedback text-center">
                            กรุณาใส่ข้อมูลให้ถูกต้อง
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success w-100 btn-sm mt-3"><i class="bi bi-search"></i> ตกลง</button>
                    <a href="index.php"><button type="button" class="btn btn-primary w-100 btn-sm mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-binoculars-fill" viewBox="0 0 16 16">
                                <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                            </svg> กลับไปหน้าหลัก</button></a>

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