<?php
session_start();
include("../config.php");

$user = mysqli_real_escape_string($conn, $_POST["txt1"]);
$pass = mysqli_real_escape_string($conn, $_POST["txt2"]);

$_SESSION["user"] = $user;
$_SESSION["pass"]  =  $pass;

$sql = "SELECT * FROM `tb_user` WHERE tb_user.user = '" . $_SESSION["user"] . "' AND tb_user.pass ='" . $_SESSION["pass"]  . "'";
$re = mysqli_query($conn, $sql);
$num = mysqli_num_rows($re);
$row = mysqli_fetch_assoc($re);
if ($num > 0) {
    $_SESSION["id"] = $row["id"];
    $_SESSION["status"] = $row["status"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["img"] = $row["img"];
    mysqli_query($conn, "UPDATE `tb_user` SET `online` = '1' WHERE `tb_user`.`id` = '" . $_SESSION["id"] . "';");
    header('Location: home.php');
    exit;
} else {
    header('Location: ../index.php?error=1');
    exit;
}
