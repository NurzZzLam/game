<?php

session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
$result = $conn->query("SELECT * FROM game");
?>

<?php
include "header.php";
?>

<div class="container-fluid">
  <div class="row">
    <?php
  include "menu.php";
  ?>

<?php
    } else { 
        header("Location: ../gagal.php"); 
    } 
?>