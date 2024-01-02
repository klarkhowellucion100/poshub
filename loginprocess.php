<?php
session_start();

include 'db.inc.php';

if(isset($_POST['signin']))


{
    include 'db.inc.php';

    $uname =mysqli_real_escape_string($conn,$_POST['uname']);
    $pword = mysqli_real_escape_string($conn,$_POST['pword']);

    if(empty($uname) || empty($pword))
{
   

    echo '<script> alert ("Please Complete Fields"); window.location.href = "login.php";</script>';
}else {

    $query = "SELECT * FROM usertablehubpos WHERE uname='$uname'";
    $result = mysqli_query ($conn,$query);

    if($row = mysqli_fetch_array($result)) {

       


            if($row['uname'] == $uname && $row['pword'] == $pword && $row['regval'] == 'Accept') {


               
                   $_SESSION['uname'] = $uname;  
                   $_SESSION['id'] = $row['id'];                    
                   $_SESSION['type'] = $row['type'];       
                   $_SESSION['code'] = $row['code'];            
                    $_SESSION['fname'] = $row['fname'];                  
                    $_SESSION['position'] = $row['position'];
                    $_SESSION['office'] = $row['office'];             
                    $_SESSION['bday'] = $row['bday'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['cnumber'] = $row['cnumber'];
                    $_SESSION['eaddr'] = $row['eaddr'];
                    $_SESSION['pfile'] = $row['pfile'];
                    $_SESSION['pdoc'] = $row['pdoc'];
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['regval'] = $row['regval'];
                    $_SESSION['acro'] = $row['acro'];
                


       

                  // echo '<script> alert ("Success"), header "location:header2b.php";</script>';
                    //echo '<script> alert("Success"); window.location.href = "header2b.php";</script>';
echo '<script> alert("Successfully Logged-in"); window.location.href = "dashboard.php";</script>';
//echo $result;
               //    header("location:header2b.php");
                
            }
            
            
            
            elseif($row['uname'] == $uname && $row['pword'] == $pword && $row['regval'] == 'Accept' && $row['type'] == 'Employee') {


               
                $_SESSION['uname'] = $uname;  
                $_SESSION['id'] = $row['id'];                    
                $_SESSION['type'] = $row['type'];       
                $_SESSION['code'] = $row['code'];            
                 $_SESSION['fname'] = $row['fname'];
                 $_SESSION['position'] = $row['position'];
                 $_SESSION['office'] = $row['office'];
                 $_SESSION['bday'] = $row['bday'];
                 $_SESSION['age'] = $row['age'];
                 $_SESSION['gender'] = $row['gender'];
                 $_SESSION['cnumber'] = $row['cnumber'];
                 $_SESSION['eaddr'] = $row['eaddr'];
                 $_SESSION['pfile'] = $row['pfile'];
                 $_SESSION['pdoc'] = $row['pdoc'];
                 $_SESSION['type'] = $row['type'];
                 $_SESSION['regval'] = $row['regval'];
                 $_SESSION['acro'] = $row['acro'];

    

               // echo '<script> alert ("Success"), header "location:header2b.php";</script>';
                 //echo '<script> alert("Success"); window.location.href = "header2b.php";</script>';
echo '<script> alert("Successfully Logged-in"); window.location.href = "volumeadd.php";</script>';
//echo $result;
            //    header("location:header2b.php");
             
         }
            
            
            else {

                
          
               echo '<script> alert ("Account Being Verified/Incorrect Username or Password"); window.location.href = "login.php";</script>';
            }


    }

    else {

        
        echo '<script> alert ("Not Registered"); window.location.href = "login.php";</script>';
    }

}
}







    

if (isset($_POST['submit']))
{ 
    include 'db.inc.php';
     


 
    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $position= mysqli_real_escape_string($conn,$_POST['position']);
 
    $uname= mysqli_real_escape_string($conn,$_POST['uname']);
    $pword= mysqli_real_escape_string($conn,$_POST['pword']);

    $regval= mysqli_real_escape_string($conn,$_POST['regval']);
    $type= mysqli_real_escape_string($conn,$_POST['type']);








     if(empty($uname))
    {
        header("Location:login.php?signup=empty");
        exit();

                
                } else {

                    

                    $sql = "INSERT INTO usertable (type,fname,position,uname,pword) VALUES ('$type','$fname','$position','$uname','$pword');";

                    $result = mysqli_query($conn, $sql);
                    echo '<script> alert("Successfully Signed up"); window.location.href = "login.php";</script>';
                    //echo $result;

                    
        exit();

                    
                    

               } 
      
                if (in_array($fileActualExt,$allowed)){
                    if($fileError === 0){
                        if($fileSize<1500000){
                
                            $fileNameNew = uniqid ('',true).".".$fileActualExt;
                            $fileDestination = 'users/'.$fileNameNew;
                            move_uploaded_file ($fileTmpName,$fileDestination);
                                header ("Location: login.php?uploadsuccess");
                
                
                        }//else {
                          //  echo "Your file is too BIG!";
                        //}
                    } //else {echo "There was an error uploading your file";
                
                  }//else {
             
                
            }

?>