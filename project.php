<?php 
    $Name=$_POST['Name'];
    $Age=$_POST['Age'];
    $Gender=$_POST['Gender'];
    $Email=$_POST['Email'];
    $Mobile=$_POST['Mobile'];
    $Doc_name=$_POST['Doc_name'];
    $Appointment_date=$_POST['Appointment_date'];
    $Description=$_POST['Description'];
    $Terms=$_POST['Terms'];
    
    $conn=new mysqli('localhost', 'root', '', 'project database');
    if($conn->connect_error)
       {
          echo"$conn->connect_error";
          die("Connection Failed:".$conn->connect_error);
       }
    else{
        $stmt = $conn->prepare("insert into patient( Name, Age, Gender, Email, Mobile, Doc_name, Appointment_date, Description, Terms) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sississss" , $Name, $Age, $Gender, $Email, $Mobile, $Doc_name, $Appointment_date, $Description, $Terms);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration sucessfully Done...";
        $stmt->close();
         $conn->close();
    }
?>