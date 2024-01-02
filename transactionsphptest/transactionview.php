
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
    if(isset($_POST['commodityid'])){ 
?>

<?php 

$commodityid = $_POST['commodityid'];

?>

<!--START OVERALL -->

                                          

                                <div class="row">
                                   

                                    <?php  
                                        $sql = "SELECT * FROM commodityhubpos WHERE id=$commodityid";
                                                $query = mysqli_query($conn, $sql);
                                    ?>

                                    <?php 
                                        while($q = mysqli_fetch_array($query)){ 
                                    ?> 
                                    
                                    <?php
                                                                
                                        //$add_prod_file = $q['add_prod_file'];
                                        
                                    ?>
                                                                  
                                </div>

                                         

                                            <div class="mb-3">
                                                <label for="dcom" class="form-label">Commodity</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_comm" readonly value="<?php echo $q['commodity'];?>">
                                                <p><?php echo $q['commodity'];?></p>
                                            </div>

                                       
                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Type</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_type" readonly value="<?php echo $q['type'];?>">
                                                <p><?php echo $q['type'];?></p>
                                            </div>

                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Selling Type</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_sellingtype" readonly value="<?php echo $q['sellingtype'];?>">
                                                <p><?php echo $q['type'];?></p>
                                            </div>

                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Class</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_class" readonly value="<?php echo $q['classcom'];?>">
                                                <p><?php echo $q['classcom'];?></p>
                                            </div>


                                            <div class="mb-3">
                                                <label for="drate" class="form-label">Price</label>
                                                <input type="text" class="form-control" required id="trans_price" value="<?php echo $q['price'];?>">                                              
                                            </div>

                                            <div class="mb-3">
                                                <label for="dund" class="form-label"> Commited Volume (kg) <span style="color:crimson;">*Only if farmgate</span></label>
                                                <input type="text" class="form-control" required id="trans_commitvol" placeholder="Please Enter Weight (kg) *">
                                            </div>

                                            <div class="mb-3">
                                                <label for="dund" class="form-label">Actual Volume (kg)</label>
                                                <input type="text" class="form-control" required id="trans_volume" placeholder="Please Enter Weight (kg) *">
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
                                                <input type="text" class="form-control" id="trans_date" readonly value="<?php echo $date_f;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cyear" class="form-label">Year</label>
                                                <input type="text" class="form-control" id="trans_year" readonly value="<?php echo $date_y;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cmonth" class="form-label">Month</label>
                                                <input type="text" class="form-control" id="trans_month" readonly value="<?php echo $date_m;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="cday" class="form-label">Day</label>
                                                <input type="text" class="form-control" id="trans_day" readonly value="<?php echo $date_d;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="ctime" class="form-label">Time</label>
                                                <input type="text" class="form-control" id="trans_time" readonly value="<?php echo $date_t;?>">
                                            </div>
                                            <div class="mb-3" style="display:none;">
                                                <label for="encoder" class="form-label">Encoder</label>
                                                <input type="text" class="form-control" id="trans_encoder" readonly value="<?php echo $userid;?>">
                                            </div>
                                           
                                     
                                           


                                    
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
<?php } ?>







    









                               

















