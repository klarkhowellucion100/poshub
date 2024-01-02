


<?php 
     

     include_once 'db.inc.php';
     
     if(isset($_POST['update'])) {
         $id= mysqli_real_escape_string($conn,$_POST['id']);
         $type= mysqli_real_escape_string($conn,$_POST['type']);
         $regval= mysqli_real_escape_string($conn,$_POST['regval']);
       
 
 
         $query = "UPDATE usertable SET id= '".$id."',                
                     type= '".$type."',
                     regval= '".$regval."' WHERE id = '".$id."'";
 
 
         $result = mysqli_query($conn,$query);
        //  echo $result;
        header("location:pendingregistrationupdate.php?update=$id");
 
     }
 ?>
 
 
 
 <?php
 if (isset($_GET['delete']) && isset($_GET['deletefile']) && isset($_GET['deletepds'])) {
         include_once 'db.inc.php';
        
         $id = $_GET['delete'];
        
        $query="DELETE FROM usertable WHERE id = $id";
        $result01 = mysqli_query($conn,$query);
     
     
     
        header("location:pendingregistration.php");
     
       // header("Location:courtorderentrytracker.php?deleted=success");
       // exit();
 
       
 
 
             }
 
     
     
        
     
       // header("Location:courtorderentrytracker.php?deleted=success");
       // exit();
     
 
 
 
 
 
 ?>