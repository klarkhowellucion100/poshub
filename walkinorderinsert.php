<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['trans_comm']) && isset($_POST['trans_type']) && isset($_POST['trans_sellingtype']) && isset($_POST['trans_class']) && isset($_POST['trans_price']) && isset($_POST['trans_volume']) && isset($_POST['trans_date']) && isset($_POST['trans_year']) && isset($_POST['trans_month']) && isset($_POST['trans_day']) && isset($_POST['trans_time']) && isset($_POST['trans_encoder']) && isset($_POST['trans_commitvol'])){

    $sql="insert into `transactiontemphubpos` (trans_commitvol,trans_comm,trans_type,trans_sellingtype,trans_class,trans_price,trans_volume,trans_date,trans_year,trans_month,trans_day,trans_time,trans_encoder)
    values ('$trans_commitvol','$trans_comm','$trans_type','$trans_sellingtype','$trans_class','$trans_price','$trans_volume','$trans_date','$trans_year','$trans_month','$trans_day','$trans_time','$trans_encoder')";

    $result=mysqli_query($conn,$sql);
}
?>