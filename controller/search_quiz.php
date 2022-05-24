<?php
include './connection.php';
if(isset($_POST['submit']))
{
    $subject=$_POST['subject_name'];
    echo "$subject";
}

?>