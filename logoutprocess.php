







    

<?php


session_start();


include 'db.inc.php';






//session
$uid = $_SESSION['id'];
$time = "";

$query=mysqli_query($conn, "UPDATE usertablehubpos SET status='Offline now' WHERE id=$uid");
// echo '-------------------------------------'.$userprofile;

//echo $time;




session_unset();

echo '<script> alert("Successfully Logged-out"); window.location.href = "login.php";</script>';


?>









   



