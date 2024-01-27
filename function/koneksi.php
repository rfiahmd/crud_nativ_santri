<?php

$hn = "localhost";
$un = "root";
$pwd = "";
$db = "dbsantri";

$kon = mysqli_connect($hn, $un, $pwd, $db);

if (!$kon) {
    echo "Database gagal terhubung.";
}
