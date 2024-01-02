


<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['code']) && isset($_POST['fname'])  && isset($_POST['cnumber']) && isset($_POST['type']) && isset($_POST['region']) && isset($_POST['province']) && isset($_POST['municipality']) && isset($_POST['barangay'])){





    $sql="insert into registrationhubpos (code,fname,cnumber,type,region,province,municipality,barangay)
    values ('$code','$fname','$cnumber','$type','$region','$province','$municipality','$barangay')";

    $result003=mysqli_query($conn,$sql);

    
}
?>

<?php
if (isset($_GET['delete'])) {
    include_once 'db.inc.php';
   
   $id = $_GET['delete'];
   $query="DELETE FROM registrationhubpos WHERE id = $id";
   $result = mysqli_query($conn,$query); /*or die ("Cannot delete data from database.". mysqli_error($conn));
   if($fire) echo "Data deleted from database";*/


   header("location:partnerregistration.php");

  // header("Location:courtorderentrytracker.php?deleted=success");
  // exit();
}
?>

