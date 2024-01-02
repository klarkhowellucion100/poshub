<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['encoder']) && isset($_POST['dcom']) && isset($_POST['dcoty']) && isset($_POST['dunt']) && isset($_POST['deuw']) && isset($_POST['dund']) && isset($_POST['drate']) && isset($_POST['cmonth']) && isset($_POST['cday']) && isset($_POST['cyear']) && isset($_POST['ctime']) && isset($_POST['cfull'])){

    $sql="insert into `volumetemp` (encoder,dcom,dcoty,dunt,deuw,dund,drate,cmonth,cday,cyear,ctime,cfull)
    values ('$encoder','$dcom','$dcoty','$dunt','$deuw','$dund','$drate','$cmonth','$cday','$cyear','$ctime','$cfull')";

    $result=mysqli_query($conn,$sql);
}
?>