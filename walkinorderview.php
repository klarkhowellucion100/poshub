
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
    if(isset($_POST['comm']) && isset($_POST['date_price'])){ 
?>

<?php 

$comm = $_POST['comm'];
$date_price = $_POST['date_price'];

?>

<!--START OVERALL -->

                                          

                                <div class="row">
                                   

                                    <?php  
                                        $sql = "SELECT * FROM comm_pospricenew WHERE comm_f LIKE '%$comm%' AND comm_date_f='$date_price'";
                                                $query = mysqli_query($conn, $sql);
                                    ?>

                                    <?php 
                                        while($q = mysqli_fetch_array($query)){ 
                                    ?> 
                                    
                                   
                                                                  
                                </div>

                                         

                                            <div class="mb-3">
                                                <label for="dcom" class="form-label">Commodity</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_comm" readonly value="<?php echo $q['comm_f'];?>">
                                                <p><?php echo $q['comm_f'];?></p>
                                            </div>

                                       
                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Type</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_type" readonly value="<?php echo $q['comm_type_f'];?>">
                                                <p><?php echo $q['comm_type_f'];?></p>
                                            </div>

                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Selling Type</label>
                                                <input style="display:none;" type="text" class="form-control" id="trans_sellingtype" readonly value="Wholesale">
                                                <p>Wholesale</p>
                                            </div>

                                            <div class="mb-3" >
                                                <label for="dcoty" class="form-label">Class</label>
                                                <select class="form-select" aria-label="Default select example" id="trans_class">
                                                        <option value='Class A'>Class A</option>
                                                        <option value='Class B'>Class B</option>
                                                        <option value='Class C'>Class C</option>                              
                                                </select>  
                                            </div>


                                            <div class="mb-3" >
                                                <label for="drate" class="form-label">Price</label>
                                                <input type="text" class="form-control" required id="trans_price" value="<?php echo $q['comm_wsp_f'];?>">      
                                                                                    
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    // Event listener for the change in the trans_class dropdown
                                                    $('#trans_class').change(function() {
                                                        // Get the selected value
                                                        var selectedClass = $(this).val();

                                                        // Get the initial price value
                                                        var initialPrice = <?php echo $q['comm_wsp_f'];?>;

                                                        // Calculate the new price based on the selected class
                                                        var newPrice;
                                                        switch (selectedClass) {
                                                            case 'Class A':
                                                                newPrice = initialPrice * 1;
                                                                break;
                                                            case 'Class B':
                                                                newPrice = initialPrice * 0.75;
                                                                break;
                                                            case 'Class C':
                                                                newPrice = initialPrice * 0.50;
                                                                break;
                                                            case 'Class D':
                                                                newPrice = initialPrice * 0.40;
                                                                break;
                                                            default:
                                                                newPrice = initialPrice;
                                                        }

                                                        // Update the trans_price input with the new value
                                                        $('#trans_price').val(newPrice);
                                                    });
                                                });
                                                </script>

                                            <div class="mb-3" style="display:none;">
                                                <label for="dund" class="form-label"> Committed Volume (kg) <span style="color:crimson;"></span></label>
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







    









                               

















