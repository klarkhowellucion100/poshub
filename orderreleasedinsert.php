<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['trans_id']) && isset($_POST['trans_price']) && isset($_POST['trans_volume'])){

        $trans_id = mysqli_real_escape_string($conn,$_POST['trans_id']);
        $trans_price= mysqli_real_escape_string($conn,$_POST['trans_price']);
        $trans_volume= mysqli_real_escape_string($conn,$_POST['trans_volume']);

        $query = "UPDATE transactionfinalhubpos SET trans_id= '".$trans_id."',                
        trans_price= '".$trans_price."',
        trans_volume= '".$trans_volume."' WHERE trans_id = '".$trans_id."'";


        $result = mysqli_query($conn,$query);

}
?>