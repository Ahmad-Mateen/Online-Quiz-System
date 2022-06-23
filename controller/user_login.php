<?php
class UserLogin
{
    function login()
    {
        include "./connection.php";
        if(isset($_POST['submit']))
{
    $name=$_POST['username'];
    $password=$_POST['userpassword'];
    $usertype=$_POST['usertype'];
    if(!preg_match("/^[a-zA-Z-'\s]*$/",$name))
    {
      echo "Validation Error ". " ! "."Your Name must be contains only characters";
    }
    else if(!preg_match("/[A-Za-z0-9]+/",$password))
    {
     echo "Validation Error ". " ! "."Invalid Format";
    }
    else if($usertype=="Select User")
    {
     echo "Validation Error ". " ! "."Select User type";
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
            echo "Error ". " ! ". "Email & Password are incorrect";
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
    }
}
$obj=new UserLogin();
$obj->login();
?>
