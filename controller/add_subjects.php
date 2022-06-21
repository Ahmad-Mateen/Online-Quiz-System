<?php
session_start();
//error_reporting(0);
class add_subjects
{
    public function subjects()
    {
      include './connection.php';
      if(isset($_POST['submit']))
      {
         $subject_name=$_POST['subject_name'];
         if(!preg_match("/^[a-zA-Z-'\s]*$/",$subject_name))
         {
           echo "Validation Error ". " ! "."Subject Name must be contains only characters";
         }
         else
         {
          $stmt = $conn->prepare("INSERT INTO quiz_subjects (subject_name) VALUES (?)");
          $stmt->bind_param("s",$subject_name);
           $_SESSION['subjectName'] = $subject_name;
       
           if($stmt->execute()==TRUE)
           {
          
            header("location: ../controller/add_questions.php");
           }
           
           else
           {
             echo "Error".$stmt->error;
           }
         }
        
    }
}
}
$obj=new add_subjects();
$obj->subjects();  
?>