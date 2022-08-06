<?php
include("../../config.php");
if (isset($_POST["btnin"])) {
    $arr = array(
        $_POST["txt1"],
        $_POST["txt2"],
        $_POST["txt3"],
        $_POST["txt4"],
        $_POST["txt6"],
        $_POST["txt7"],
    );

    $sql1 = "SELECT * FROM `tb_user` WHERE tb_user.user='" . $arr[0] . "';";
    $re1 = mysqli_query($conn, $sql1);
    $num = mysqli_num_rows($re1);

    if ($num > 0) {
        header('Location: ../page3.php?up=2');
        exit;
    } else {
        if ($arr[0] !== "" && $arr[1] !== "" && $arr[2] !== "" && $arr[3] !== "") {
            $re3 = mysqli_query($conn, "SELECT MAX(tb_user.id) FROM `tb_user`LIMIT 1;");
            $num = mysqli_fetch_assoc($re3);
            $atn = $num["MAX(tb_user.id)"] + 1;

            if (empty($_FILES['txt4']['name'])) {
                $newname = "user.png";
            } else {
                $img = pathinfo(basename($_FILES['txt4']['name']), PATHINFO_EXTENSION);
                $newname = $atn . "." . $img;
                $upload = copy($_FILES['txt4']['tmp_name'], "../../img/" . $newname);
            }

            $sql = "INSERT INTO `tb_user` (`id`, `user`, `pass`, `name`,`status`,`img`,`question`,`answer`) VALUES ('" . $atn . "', '" . $arr[0] . "', '" . $arr[1] . "', '" . $arr[2] . "', '" . $arr[3] . "', '" . $newname . "', '" . $arr[4]  . "', '" . $arr[5] . "');";

            $re = mysqli_query($conn, $sql);

            if ($re) {
                header('Location: ../page3.php?up=0');
                exit;
            } else {
                header('Location: ../page3.php?up=1');
                exit;
            }
        } else {
            header('Location: ../page3.php?up=1');
            exit;
        }
    }
}
