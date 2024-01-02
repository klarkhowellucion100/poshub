
<!-- STart Category -->
<?php


include 'db.inc.php';

if(isset($_POST['commodity_main'])){ ?>


<?php 

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
                        $query1 = mysqli_query($conn,"SELECT * FROM comm_posnew WHERE comm LIKE '%$commodity_main%' ORDER BY comm ASC");
                        while($q = mysqli_fetch_array($query1)): ?>


                        <?php
                        
                        //$add_prod_file = $q['add_prod_file'];

                        ?>
                        <div class="col-xl-4 col-sm-6">
                            <div class="product-box">
                                <div class="product-img pt-4 px-4">
                                    <div class="product-ribbon badge bg-warning">
                                        Class A
                                    </div>
                                    <div class="product-wishlist">
                                        <a href="#">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </a>
                                    </div>
                                    <!--<img src="" alt="" style="height:150px; widht:100%;" class="img-fluid mx-auto d-block">-->
                                </div>

                                <div class="text-center product-content p-4">

                                    <h5 class="mb-1"><a href="#" class="text-dark"><?php echo $q['comm']; ?></a></h5>
                                    <p class="text-muted font-size-13" id="class_type"><?php echo $q['comm_type']; ?></p>
                                    <p class="text-muted font-size-13">Wholesale</p>

                                    <!--<h5 class="mt-3 mb-0"><span class="text-muted me-2"></span> P </h5>-->



                                    <a class='productinfo btn btn-primary' style="margin-top: 20px;" data-id="<?php echo $q['comm'];?>"> Add </a> 

                               
                                       
                                </div>
                               
                            </div>
                        </div>
                        <?php endwhile; ?>

                        <script>         
                                $(document).ready(function(){
                                $('.productinfo').click(function(){
                                    var comm = $(this).data('id');
                                    var date_price = document.getElementById('date_price').value;
                                   
                                    $.ajax({
                                                url:"walkinorderview.php",
                                                method:"POST",
                                                data:{comm:comm,date_price:date_price},
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

