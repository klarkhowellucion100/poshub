<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['transpartner_1'])){ ?>


<?php 

$transpartner_1 = $_POST['transpartner_1'];

?>





                                                           

                                                            <?php  
                                                                $sql = "SELECT * FROM registrationhubpos WHERE fname='$transpartner_1' GROUP BY fname";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>

                                                                

                                                            <?php foreach($query as $q){ ?>  
                                                                <option value='<?php echo $q ['code'];?>'><?php echo $q ['code'];?></option>                                                
                                                            <?php } ?>
                     
                 
<?php } ?>

<!-- End Category -->

<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['transpartner_2'])){ ?>


<?php 

$transpartner_2 = $_POST['transpartner_2'];

?>





                                                           

                                                        <?php  
                                                                $sql1 = "SELECT * FROM registrationhubpos WHERE fname='$transpartner_2' GROUP BY `type`";
                                                                $query1 = mysqli_query($conn, $sql1);
                                                            ?>

                                                                

                                                            <?php foreach($query1 as $q1){ ?>  
                                                                <option value='<?php echo $q1 ['type'];?>'><?php echo $q1 ['type'];?></option>                                                
                                                            <?php } ?>
                     
                     
                 
<?php } ?>

<!-- End Category -->