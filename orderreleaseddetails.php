
<?php
include 'db.inc.php';

session_start();


//session
$userprofile = $_SESSION['uname'];
$userid = $_SESSION['id'];
$userfname = $_SESSION['fname'];
$usertype= $_SESSION['type'];


if($userprofile==true){

} else {

    header("location:index.php");
}

$query= "SELECT * FROM usertablehubpos WHERE uname ='$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);

?>

<?php
 include 'db.inc.php';
 if(isset($_POST['comm']) && isset($_POST['date_price']) && isset($_POST['comm_value3'])){ 
?>

<?php 
$comm = $_POST['comm'];
$date_price = $_POST['date_price'];
$comm_value3 = $_POST['comm_value3'];
?>

<!--START OVERALL -->

                                          
                    <div class="row">          
                         
                         <?php  
                             $sql1 = "SELECT * FROM comm_pospricenew WHERE comm_date_f='$date_price' AND comm_f = '$comm_value3'";
                                     $query1 = mysqli_query($conn, $sql1);
                         ?>

                         <?php 
                              while($q1 = mysqli_fetch_array($query1)){ 
                         ?> 
                                 <div class="mb-3" >
                                     <label for="drate" class="form-label">Price</label>
                                     <input type="text" class="form-control" required id="trans_price" value="<?php echo $q1['comm_wsp_f'];?>">     
                                 </div>
                         <?php } ?>    

                             
                         <?php  
                             $sql = "SELECT * FROM transactionfinalhubpos WHERE trans_id=$comm";
                                     $query = mysqli_query($conn, $sql);
                         ?>
                         <?php 
                             while($q = mysqli_fetch_array($query)){ 
                         ?> 
                                 <div class="mb-3" style='display:none;'>
                                     <label for="cfull" class="form-label">ID</label>
                                     <input type="text" class="form-control" id="trans_id" value="<?php echo $q['trans_id'];?>">
                                 </div>

                                 <div class="mb-3">
                                     <label for="dund" class="form-label">Actual Volume (kg)</label>
                                     <input type="text" class="form-control" required id="trans_volume" value="<?php echo $q['trans_volume'];?>" placeholder="Please Enter Weight (kg) *">
                                 </div>
                         <?php } ?>                                    
                                
                             </div>
                         </div>
                     </div>
<?php } ?>







    









                               

















