<?php
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$nama_foto = uniqid() . '_' . $foto;

move_uploaded_file($tmp, "foto/" . $nama_foto);

$query = "INSERT INTO users (username, password, level, foto) VALUES ('$username', '$password', '$level', '$nama_foto')";
mysqli_query($conn, $query);

header("Location: users.php");
?>