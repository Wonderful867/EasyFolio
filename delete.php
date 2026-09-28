<?php
include("config.php");

$id = $_GET["id"];
$connect->query("DELETE FROM register WHERE id=$id");

header("Location: read.php");
?>