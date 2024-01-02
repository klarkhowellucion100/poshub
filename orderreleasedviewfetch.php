
<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['commt_1'])){ ?>


<?php 

$commt_1 = $_POST['commt_1'];

?>





                                                           

                                                            <?php  
                                                                $sql = "SELECT * FROM comm_pospricenew WHERE `comm_type_f`='$commt_1' GROUP BY comm_f";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>

                                                            <option value=''>Please Select Commodity *</option>             

                                                            <?php foreach($query as $q){ ?>  
                                                                <option value='<?php echo $q ['comm_f'];?>'><?php echo $q ['comm_f'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->


<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['date_price2']) && isset($_POST['comm_2'])){ ?>


<?php 

$date_price2 = $_POST['date_price2'];
$comm_2 = $_POST['comm_2'];

?>

                                    <?php  
                                        $sql = "SELECT * FROM comm_pospricenew WHERE comm_f LIKE '%$comm_2%' AND comm_date_f='$date_price2'";
                                                $query = mysqli_query($conn, $sql);
                                    ?>

                                    <?php 
                                        while($q = mysqli_fetch_array($query)){ 
                                    ?> 
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
                                                            default:
                                                                newPrice = initialPrice;
                                                        }

                                                        // Update the trans_price input with the new value
                                                        $('#trans_price').val(newPrice);
                                                    });
                                                });
                                                </script>
                                    <?php } ?>

                     
                 
<?php } ?>

<!-- End Category -->


<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['commt_3']) && isset($_POST['stype_3']) && isset($_POST['comm_3']) && isset($_POST['comcl_3'])){ ?>


<?php 

$commt_3 = $_POST['commt_3'];
$stype_3 = $_POST['stype_3'];
$comm_3 = $_POST['comm_3'];
$comcl_3 = $_POST['comcl_3'];

?>





                                                           

                                                            <?php  
                                                                $sql2 = "SELECT * FROM commodityhubpos WHERE `type`='$commt_3' AND sellingtype='$stype_3' AND commodity='$comm_3' AND classcom='$comcl_3' GROUP BY price";
                                                                $query2 = mysqli_query($conn, $sql2);
                                                            ?>

                                                              

                                                            <?php foreach($query2 as $q2){ ?>  
                                                                <option value='<?php echo $q2 ['price'];?>'><?php echo $q2 ['price'];?></option>                          
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->
