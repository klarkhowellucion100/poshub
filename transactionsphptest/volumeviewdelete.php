<?php
if (isset($_GET['delete']) && isset($_GET['deletefile'])) {
        include_once 'db.inc.php';
       
        $recno = $_GET['delete'];
       
       $query="DELETE FROM drvolume WHERE (recno LIKE '%$recno%')";
       $result01 = mysqli_query($conn,$query);
       
       /*or die ("Cannot delete data from database.". mysqli_error($conn));
       if($fire) echo "Data deleted from database";*/
    
    
     
    
      // header("Location:courtorderentrytracker.php?deleted=success");
      // exit();
}        if($result01) {
    
       
       $query="DELETE FROM volume WHERE (code LIKE '%$recno%')";
       $result01 = mysqli_query($conn,$query);
       unlink($_GET['deletefile']);
       /*or die ("Cannot delete data from database.". mysqli_error($conn));
       if($fire) echo "Data deleted from database";*/

       header("location:volumeview.php");
}  

?>