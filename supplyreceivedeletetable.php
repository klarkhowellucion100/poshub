<?php
if (isset($_GET['delete'])) {
        include_once 'db.inc.php';
       
        $trans_code = $_GET['delete'];
       
       $query="DELETE FROM transactionsdrhubpos WHERE (trans_code LIKE '%$trans_code%')";
       $result01 = mysqli_query($conn,$query);
       
       /*or die ("Cannot delete data from database.". mysqli_error($conn));
       if($fire) echo "Data deleted from database";*/
    
    
     
    
      // header("Location:courtorderentrytracker.php?deleted=success");
      // exit();
}        if($result01) {
    
       
       $query="DELETE FROM transactionfinalhubpos WHERE (ftrans_code LIKE '%$trans_code%')";
       $result01 = mysqli_query($conn,$query);
       /*or die ("Cannot delete data from database.". mysqli_error($conn));
       if($fire) echo "Data deleted from database";*/

       header("location:supplyreceive.php");
}  

?>