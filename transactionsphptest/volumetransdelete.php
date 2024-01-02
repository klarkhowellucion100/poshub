


<?php 

include 'db.inc.php';


if(isset($_POST['deleteid'])){

    $unique=$_POST['deleteid'];

    $sql="DELETE FROM `volumetemp` WHERE id=$unique";
    $result=mysqli_query($conn,$sql);
    
}
?>