<?php
include("../../config.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM tb_sales WHERE tb_sales.id=" . $id;
    $re = mysqli_query($conn, $sql);
    if ($re) {
        header('Location: ../home.php?error=0');
        exit;
    } else {
        header('Location: ../home.php?error=1');
        exit;
    }
}
