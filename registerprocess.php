<?php

    

if (isset($_POST['submit']))
{ 
    include 'db.inc.php';
     


 
    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $position= mysqli_real_escape_string($conn,$_POST['position']);
 
    $uname= mysqli_real_escape_string($conn,$_POST['uname']);
    $pword= mysqli_real_escape_string($conn,$_POST['pword']);
    $type= mysqli_real_escape_string($conn,$_POST['type']);








     if(empty($uname))
    {
        header("Location:login.php?signup=empty");
        exit();

                
                } else {

                    

                    $sql = "INSERT INTO usertablehubpos (type,fname,position,uname,pword) VALUES ('$type','$fname','$position','$uname','$pword');";

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