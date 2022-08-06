<?php

include("../../config.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM tb_user WHERE tb_user.id=" . $id;

    $re = mysqli_query($conn, $sql);
    var_dump($re);

    if ($re) {
        header('Location: ../page3.php?error=0');
        exit;
    } else {
        header('Location: ../page3.php?error=1');
        exit;
    }
}
