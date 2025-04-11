<?php
session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id_user = $id";
 
if ($conn->query($sql) === TRUE) {
    header('Location: users.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else { 
    header("Location: ../gagal.php"); 
} 
?>