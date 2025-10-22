<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'diary';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
