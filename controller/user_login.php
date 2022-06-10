<?php
include "./connection.php";
if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];
    if(!preg_match("/^[a-zA-Z-'\s]*$/",$name))
    {
      echo "Your Name must be contains only characters";
    }
    else if(!preg_match('/^[1-9][0-9\.]{0,15}$/',$password))
    {
     echo "Your Passord must be contains only numbers";
    }
    
    else{
        $sql = "SELECT * FROM users WHERE name=? && pwd=? && usertype=?"; 
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("sss", $name,$password,$usertype);
        $stmt->execute();
        $result = $stmt->get_result();
       $total=mysqli_num_rows($result);
        //var_dump($result);
        if($total==0)
        {
            echo "Email & Password are incorrect";
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
    
   
}
?>
