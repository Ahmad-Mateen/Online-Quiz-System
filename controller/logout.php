<?php
session_start();
class logout
{
    public function delete()
    {
        include "./connection.php";
        $val=$_SESSION['quiz_question'];
        $sub=$_SESSION['subjectName'];
        $num=5;
        if($val<$num)
        {
            
            
            $update = $conn->prepare("DELETE FROM quiz_subjects WHERE subject_name= ?");
            $update->bind_param('s', $sub);
                if($update->execute()==TRUE)
                {
                    $stmt = $conn->prepare("DELETE FROM quiz_questions WHERE subject_name= ?");
                    $stmt->bind_param('s', $sub);
                    $stmt->execute();
                    header("location: ../views/user_login.html");
                }
                  
        }
        else
        {
            header("location: ../views/user_login.html");
        }
    }
} 
$obj=new logout();
$obj->delete();

?>