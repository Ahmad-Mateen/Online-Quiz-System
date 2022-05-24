<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];

    $query="select * from users where name='$name' && pwd='$password' && usertype='$usertype'";
    $result=mysqli_query($conn,$query);
    $total=mysqli_num_rows($result);
    if($total==0)
    {
        echo "Email & Password are incorect";
    }
    else
    {
        if($usertype=="Teacher")
        {
            header("location: ../views/teacher_dashboard.html");
        }
        else
        {
            header("location: ../views/student_dashboard.html");
        }
        
    }

   
}
?>
