<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "movie_journal";

//membuat koneksi ke db
$connect = new mysqli($hostname, $username, $password, $database);

//cek koneksi
if ($connect->connect_error)
    {
        die("koneksi gagal: " . $connect->connect_error);
    }

if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

?>