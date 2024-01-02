


<?php 

include 'db.inc.php';

extract($_POST);

if(isset($_POST['code']) && isset($_POST['comm']) && isset($_POST['comm_type']) && isset($_POST['comm_prod']) && isset($_POST['comm_fgpm']) && isset($_POST['comm_fgp']) && isset($_POST['comm_wspm']) && isset($_POST['comm_wsppc']) && isset($_POST['comm_wsp']) && isset($_POST['comm_srpm']) && isset($_POST['comm_unit']) && isset($_POST['comm_srp']) && isset($_POST['comm_diffp'])){





    $sql="insert into comm_posnew (code,comm,comm_type,comm_prod,comm_fgpm,comm_fgp,comm_wspm,comm_wsppc,comm_wsp,comm_srpm,comm_unit,comm_srp,comm_diffp)
    values ('$code','$comm','$comm_type','$comm_prod','$comm_fgpm','$comm_fgp','$comm_wspm','$comm_wsppc','$comm_wsp','$comm_srpm','$comm_unit','$comm_srp','$comm_diffp')";

    $result003=mysqli_query($conn,$sql);

    
}
?>

<?php
if (isset($_GET['delete'])) {
    include_once 'db.inc.php';
   
   $id = $_GET['delete'];
   $query="DELETE FROM comm_posnew WHERE id = $id";
   $result = mysqli_query($conn,$query); /*or die ("Cannot delete data from database.". mysqli_error($conn));
   if($fire) echo "Data deleted from database";*/


   header("location:commodity.php");

  // header("Location:courtorderentrytracker.php?deleted=success");
  // exit();
}
?>

