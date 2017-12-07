<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2017-12-06
 * Time: 5:36 PM
 */
//Home Connection XAMPP
$con = mysqli_connect("localhost", "root", "", "books"); //Host, User, Pass, Database

if (mysqli_connect_errno()) {
    echo "failed to connect: " . mysqli_connect_error();
}

//This stops SQL Injection in POST vars
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);
}

//This stops SQL Injection in GET vars
foreach ($_GET as $key => $value) {
    $_GET[$key] = mysqli_real_escape_string($con, $value);
}

?>