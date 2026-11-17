<?php
include ("../config/connection.php")
session_start();

$usn = $_POST['$usn'];
$pass = $_POST['$pass'];

$query = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$usn' AND password = '$pass'");

$cek = mysqli_num_rows($query);

if($cek > 0){
    $_SESSION['usn'] = $usn;

    if(isset($_POST['remember'])){
        setcookie(
            'remember_usn',
            $usn,
            time() + (86400 *  8),
            '/'
        );
    } else {
        setcookie(
            'remember_usn',
            '',
            time() + (7200),
            '/'
        );
    }
    header("location: ../index.php");
} else{
    header("location: ../login.php?pesan=gagal")
}
?>