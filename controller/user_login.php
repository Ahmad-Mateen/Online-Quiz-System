<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];

    $sql = "SELECT * FROM users WHERE name=? && pwd=? && usertype=?"; 
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sss", $name,$password,$usertype);
    $stmt->execute();
    $result = $stmt->get_result();
   $total=mysqli_num_rows($result);
    //var_dump($result);
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
