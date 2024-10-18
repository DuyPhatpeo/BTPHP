<?php
$username = $_POST['user'];
$password = $_POST['pass'];

if ($username == "admin" && $password == "12345") {
    echo "<font color=red> Welcome to, " . $username . "<font>";
} else {
    echo "<font color=red>$Username hoac password khong chinh xac, vui long nhap lai<font>";
}
