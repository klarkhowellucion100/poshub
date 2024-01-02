


<?php
if (isset($_GET['update'])&&isset($_GET['paydate'])) {
        include_once 'db.inc.php';
       
        $trans_code = $_GET['update'];
        $trans_date = $_GET['paydate'];
       
       $query="UPDATE transactionsdrhubpos SET trans_code= '".$trans_code."', trans_paymentdate = '".$trans_date."',                   
       trans_status= 'Paid' WHERE trans_code = '".$trans_code."'";
       $result01 = mysqli_query($conn,$query);
       
       /*or die ("Cannot delete data from database.". mysqli_error($conn));
       if($fire) echo "Data deleted from database";*/
    
    
       header("location:receiptpurchase.php");
    
      // header("Location:courtorderentrytracker.php?deleted=success");
      // exit();
}        

?>