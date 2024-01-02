
<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['type_main']) && isset($_POST['commodity_main'])){ ?>


<?php 

$type_main = $_POST['type_main'];
$commodity_main = $_POST['commodity_main'];

?>





                                                           
<div class="row">
                    <?php  

                        $date_f = date('Y/m/d');

                        $date_t = date('H:i:s');
                        $date_m = date('m');
                        $date_d = date('d');
                        $date_y = date('Y');

                    ?>

                        <?php
                        $query1 = mysqli_query($conn,"SELECT * FROM commodityhubpos WHERE (`sellingtype` LIKE '%$type_main%') AND (`commodity` LIKE '%$commodity_main%') ORDER BY commodity ASC");
                        while($q = mysqli_fetch_array($query1)): ?>


                        <?php
                        
                        //$add_prod_file = $q['add_prod_file'];

                        ?>
                         <div class="col-xl-4 col-sm-6">
                            <div class="product-box">
                                <div class="product-img pt-4 px-4">
                                    <div class="product-ribbon badge bg-warning">
                                        <?php echo $q['classcom']; ?>
                                    </div>
                                    <div class="product-wishlist">
                                        <a href="#">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </a>
                                    </div>
                                    <!--<img src="" alt="" style="height:150px; widht:100%;" class="img-fluid mx-auto d-block">-->
                                </div>

                                <div class="text-center product-content p-4">

                                    <h5 class="mb-1"><a href="#" class="text-dark"><?php echo $q['commodity']; ?></a></h5>
                                    <p class="text-muted font-size-13"><?php echo $q['type']; ?></p>
                                    <p class="text-muted font-size-13"><?php echo $q['sellingtype']; ?>  </p>

                                    <!--<h5 class="mt-3 mb-0"><span class="text-muted me-2"></span> P </h5>-->



                                    <a class='productinfo btn btn-primary' style="margin-top: 20px;" data-id="<?php echo $q['id'];?>"> Add </a> 

                               
                                       
                                </div>
                               
                            </div>
                        </div>
                        <?php endwhile; ?>

                        <script>         
                                $(document).ready(function(){
                                $('.productinfo').click(function(){
                                    var commodityid = $(this).data('id');
                                   
                                    $.ajax({
                                                url:"transactionview.php",
                                                method:"POST",
                                                data:{commodityid:commodityid},
                                                success:function(data){
                                                    $('.modal-body').html(data);
                                                    $('#exampleModal').modal('show');
                                                    displayData();
                                                }
                                            });

                                })
                            })
                        </script>
                </div>
                 
<?php } ?>

<!-- End Category -->

