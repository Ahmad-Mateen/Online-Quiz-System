<?php
include "./connection.php";
if(isset($_POST['save']))
{
    $name=$_POST['txt_username'];
    $email=$_POST['txt_email'];
    $password=$_POST['txt_password'];
    $usertype=$_POST['usertype'];

}


?>