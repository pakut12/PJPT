<?php
session_start();
include("../../config.php");
$sql = "SELECT * FROM `tb_user` WHERE tb_user.user = '" . $_SESSION["user"] . "' AND tb_user.pass ='" . $_SESSION["pass"]  . "'";
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
    if ($_POST["txt1"] !== "" && $_POST["txt2"] !== "" && $_POST["txt3"] !== "" && $_POST["txt4"] !== "") {
        $arr = array(
            $_POST["txt1"],
            $_POST["txt2"],
            $_POST["txt3"],
            $_POST["txt4"],
            $_POST["txt6"],
            $_POST["txt7"],
        );
        if (empty($_FILES['txt5']['name'])) {
            $newname = $_SESSION["img"];
        } else {
            $img = pathinfo(basename($_FILES['txt5']['name']), PATHINFO_EXTENSION);
            $newname = $_SESSION["id"] . "." . $img;
            $upload = copy($_FILES['txt5']['tmp_name'], "../../admin/img/" . $newname);
        }


        $sql3 = "UPDATE `tb_user` SET `user` = '" . $arr[1] . "' , `pass` = '" . $arr[2] . "'  , `name` = '" . $arr[3] . "' , `status` = '" . $_SESSION["status"] . "', `img` = '" . $newname . "', `question` = '" . $_POST["txt6"] . "', `answer` = '" . $_POST["txt7"] . "'  WHERE `tb_user`.`id` = " . $arr[0] . ";";

        $re3 = mysqli_query($conn, $sql3);
        if ($re3) {
            $re4 = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE tb_user.id = '" . $arr[0] . "';");
            $output = mysqli_fetch_assoc($re4);
            $_SESSION["id"] = $output["id"];
            $_SESSION["status"] = $output["status"];
            $_SESSION["name"] = $output["name"];
            $_SESSION["img"] = $output["img"];
            $_SESSION["user"] = $output["user"];
            $_SESSION["pass"] = $output["pass"];
            clearstatcache();
            header('Location: ../home.php?up=0');
            exit;
        } else {
            header('Location: ../home.php?up=1');
            exit;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>???????????????????????????????????????????????????</title>
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
    <link rel="icon" type="image/x-icon" href="../../../img/icon.png">
</head>

<style>
    .bg {
        background: #006699 url('../../../img/bg1.jpg') no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        width: cover;
        height: cover;
    }
</style>

<body style="font-family: 'Kanit', sans-serif;" class="bg">

    <nav class="navbar-expand-lg navbar navbar-dark bg-dark shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">???????????????????????????????????????????????????</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../home.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg>
                            ????????????????????????</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="update.php?id=<?= $_SESSION["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                            </svg>
                            ??????????????????????????????????????????????????????</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../../index.php?out=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                            </svg>
                            ??????????????????????????????</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="col-auto">
                                <img src="../../admin/img/<?php echo $_SESSION["img"]  ?>" alt="" class="rounded-circle " style="width: 5rem; height:2.7rem ;">
                            </div>
                            <div class="col-auto">
                                <div class="text-light h6 ">Name : <?php echo $_SESSION["name"] ?> <br>
                                    Status : <?php echo $_SESSION["status"] ?> <br>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </nav>
    <br><br><br>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">?????????????????????????????????</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">

                    <div class="mb-3">
                        <label for="txt1" class="form-label">User</label>
                        <input type="text" class="form-control form-control-sm" id="txt1">
                    </div>
                    <div class="mb-3">
                        <label for="txt2" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" id="txt2">
                    </div>
                    <div class="mb-3">
                        <label for="txt3" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" id="txt3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save </button>
                </div>
            </div>
        </div>
    </div>

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
                            ??????????????????????????????????????????
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
                                ????????????????????????????????????????????????????????????
                            </div>

                        </div>
                    </div>
                </div>
        <?php
            }
        }

        ?>
        <form action="update.php" method="post" name="myform" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            ??????????????????????????????????????????????????????
                        </div>
                        <div class="card-body">

                            <div class="col-4 mx-auto ">
                                <div class="card">
                                    <div class="card-header">
                                        ????????????????????????????????????
                                    </div>
                                    <div class="card-body ">
                                        <?php
                                        if (isset($_GET["id"])) {
                                            if ($_GET["id"]) {
                                                $id = $_GET["id"];
                                                $sql1 = "SELECT * FROM `tb_user` WHERE tb_user.id=" . $id;
                                                $re1 = mysqli_query($conn, $sql1);

                                                $out = mysqli_fetch_assoc($re1);
                                        ?>
                                                <input type="hidden" name="txt1" id="txt1" value="<?= $out["id"] ?>">
                                                <div class="mb-3">
                                                    <label for="txt1">ID</label>
                                                    <input type="text" name="" id="" class="form-control form-control-sm " disabled value="<?= $out["id"] ?>" required>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt2">Username</label>
                                                    <input type="text" name="txt2" id="txt2" class="form-control form-control-sm" value="<?= $out["user"] ?>" required>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt3">Password</label>
                                                    <input type="password" name="txt3" id="txt3" class="form-control form-control-sm" value="<?= $out["pass"] ?>" required>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt4">Name</label>
                                                    <input type="text" name="txt4" id="txt4" class="form-control form-control-sm" value="<?= $out["name"] ?>" required>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt5">Picture</label>
                                                    <input type="file" name="txt5" id="txt5" class="form-control form-control-sm">
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt6">???????????????</label>
                                                    <select name="txt6" id="txt6" class="form-select form-select-sm " required>
                                                        <option value="<?= $out["question"] ?>" selected><?= $out["question"] ?></option>
                                                        <option value="???????????????????????????????????????????????? ?">???????????????????????????????????????????????? ?</option>
                                                        <option value="??????????????????????????????????????????????????????????????????????????? ?">??????????????????????????????????????????????????????????????????????????? ?</option>
                                                        <option value="?????????????????????????????????????????????????????? ?">?????????????????????????????????????????????????????? ?</option>
                                                    </select>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="txt7">???????????????</label>
                                                    <input type="text" class="form-control form-control-sm" id="txt7" name="txt7" value="<?= $out["answer"] ?>" required>
                                                    <div class="invalid-feedback text-center">
                                                        ????????????????????????????????????????????????????????????????????????
                                                    </div>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button type="submit" class="btn btn-sm btn-success " style="width: 10rem;" name="submit">Save</button>
                                                    <a href="../home.php"><button type="button" class="btn btn-sm btn-primary " style="width: 10rem;">Back</button></a>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>
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

                        </div>
                        <div class="card-footer">
                            <h6 class="text-center">By PakutSingJawala</h6>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
<br>


</html>