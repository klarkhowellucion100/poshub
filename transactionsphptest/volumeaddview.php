
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

$query= "SELECT * FROM usertable WHERE uname ='$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);

?>

<?php
    include 'db.inc.php';
    if(isset($_POST['commodityid'])){ 
?>

<?php 

$commodityid = $_POST['commodityid'];

?>

<!--START OVERALL -->

                                          

                                <div class="row">
                                   

                                    <?php  
                                        $sql = "SELECT * FROM commodity WHERE id=$commodityid";
                                                $query = mysqli_query($conn, $sql);
                                    ?>

                                    <?php 
                                        while($q = mysqli_fetch_array($query)){ 
                                    ?> 
                                    
                                    <?php
                                                                
                                        //$add_prod_file = $q['add_prod_file'];
                                        
                                    ?>
                                                                  
                                </div>

                                            <div class="mb-3" style="display:none;">
                                                <label for="id" class="form-label">ID</label>
                                                <input type="text" class="form-control" id="id" readonly value="<?php echo $q['id'];?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="dcom" class="form-label">Commodity</label>
                                                <input style="display:none;" type="text" class="form-control" id="dcom" readonly value="<?php echo $q['commodity'];?>">
                                                <p><?php echo $q['commodity'];?></p>
                                            </div>

                                       
                                            <div class="mb-3" style="display:none;">
                                                <label for="dcoty" class="form-label">Type</label>
                                                <input type="text" class="form-control" id="dcoty" readonly value="<?php echo $q['type'];?>">
                                            </div>

                                            <div class="mb-3" >
                                                <div class="commo">
                                                    <label for="dunt">Unit</label>                                                                           
                                                    <input style="display:none;" type="text" class="form-control" id="dunt" readonly value="<?php echo $q['unit'];?>">
                                                    <p><?php echo $q['unit'];?></p>
                                                </div>                                        
                                            </div>

                                            <div class="mb-3" style="display:none;">
                                                <label for="deuw" class="form-label">Weight per Unit (kg)</label>
                                                <input type="text" class="form-control" id="deuw" readonly value="<?php echo $q['estkg'];?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="drate" class="form-label">Rate</label>
                                                <input style="display:none;" type="text" class="form-control" required id="drate" readonly value="<?php echo $q['rates'];?>">
                                                <p>Php <?php echo $q['rates'];?>/kilo</p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dund" class="form-label">Weight of Delivery</label>
                                                <input type="text" class="form-control" required id="dund" placeholder="Please Enter Weight (kg) *">
                                            </div>

                                            


                                            <?php  
                                                $date_f = date('Y-m-d');
                                                $date_t = date('H:i:s');
                                                $date_m = date('m');
                                                $date_d = date('d');
                                                $date_y = date('Y');
                                            ?>

                                            <div class="mb-3" style="display:none;">
                                                <label for="cfull" class="form-label">Date</label>
                                                <input type="text" class="form-control" id="cfull" readonly value="<?php echo $date_f;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cyear" class="form-label">Year</label>
                                                <input type="text" class="form-control" id="cyear" readonly value="<?php echo $date_y;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cmonth" class="form-label">Month</label>
                                                <input type="text" class="form-control" id="cmonth" readonly value="<?php echo $date_m;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cday" class="form-label">Day</label>
                                                <input type="text" class="form-control" id="cday" readonly value="<?php echo $date_d;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="ctime" class="form-label">Time</label>
                                                <input type="text" class="form-control" id="ctime" readonly value="<?php echo $date_t;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="encoder" class="form-label">Encoder</label>
                                                <input type="text" class="form-control" id="encoder" readonly value="<?php echo $userid;?>">
                                            </div>
                                           


                                    
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
<?php } ?>







    









                               

















