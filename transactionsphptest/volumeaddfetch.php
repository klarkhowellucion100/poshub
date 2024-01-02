
<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['mainreg'])){ ?>


<?php 

$mainreg = $_POST['mainreg'];

?>





                                                           

                                                            <?php  
                                                                $sql = "SELECT * FROM areas WHERE region='$mainreg' GROUP BY prov";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>

                                                            <option value=''>Please Select Province</option>             

                                                            <?php foreach($query as $q){ ?>  
                                                                <option value='<?php echo $q ['prov'];?>'><?php echo $q ['prov'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->

<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['province_0']) && isset($_POST['region_0'])){ ?>


<?php 

$province_0 = $_POST['province_0'];
$region_0 = $_POST['region_0'];

?>





                                                           

                                                            <?php  
                                                                $sql1 = "SELECT * FROM areas WHERE region='$region_0' AND prov='$province_0' GROUP BY mun";
                                                                $query1 = mysqli_query($conn, $sql1);
                                                            ?>

                                                            <option value=''>Please Select Municipality</option>             

                                                            <?php foreach($query1 as $q1){ ?>  
                                                                <option value='<?php echo $q1 ['mun'];?>'><?php echo $q1 ['mun'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->






















<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['mainreg1'])){ ?>


<?php 

$mainreg1 = $_POST['mainreg1'];

?>





                                                           

                                                            <?php  
                                                                $sql = "SELECT * FROM areas WHERE region='$mainreg1' GROUP BY prov";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>

                                                            <option value=''>Please Select Province</option>             

                                                            <?php foreach($query as $q){ ?>  
                                                                <option value='<?php echo $q ['prov'];?>'><?php echo $q ['prov'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->

<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['province_01']) && isset($_POST['region_01'])){ ?>


<?php 

$province_01 = $_POST['province_01'];
$region_01 = $_POST['region_01'];

?>





                                                           

                                                            <?php  
                                                                $sql1 = "SELECT * FROM areas WHERE region='$region_01' AND prov='$province_01' GROUP BY mun";
                                                                $query1 = mysqli_query($conn, $sql1);
                                                            ?>

                                                            <option value=''>Please Select Municipality</option>             

                                                            <?php foreach($query1 as $q1){ ?>  
                                                                <option value='<?php echo $q1 ['mun'];?>'><?php echo $q1 ['mun'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->

