


<?php 

include 'db.inc.php';


if(isset($_POST['deleteid'])){

    $unique=$_POST['deleteid'];

    $sql="DELETE FROM `transactionfinalhubpos` WHERE trans_id=$unique";
    $result=mysqli_query($conn,$sql);
    
}
?>