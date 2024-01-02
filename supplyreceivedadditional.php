<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['ftrans_code']) && isset($_POST['trans_sellingtype']) && isset($_POST['trans_type']) && isset($_POST['trans_comm']) && isset($_POST['trans_class']) && isset($_POST['trans_price']) && isset($_POST['trans_volume'])){

    $sql="insert into `transactionfinalhubpos` (ftrans_code,trans_sellingtype,trans_type,trans_comm,trans_class,trans_price,trans_volume)
    values ('$ftrans_code','$trans_sellingtype','$trans_type','$trans_comm','$trans_class','$trans_price','$trans_volume')";

    $result=mysqli_query($conn,$sql);
}
?>