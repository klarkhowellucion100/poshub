



<?php include_once 'heading.php';?>
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Products</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">POS</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

                <!-- Start Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 



                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick=addproduct()>Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>

            <!-- End Modal -->

              <!-- Start Modal -->
              <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 
                                        <div class="mb-3" style="display:none;">
                                            <label for="exampleInputPassword1" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="update_price" onchange="addvb()" placeholder="Please Enter Category">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Quantiy</label>
                                            <input type="number" class="form-control" id="update_quantity" onchange="addvb()" placeholder="Please Enter Category">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Discount</label>
                                            <input type="text" class="form-control" id="update_discount" onchange="addvb()" placeholder="Please Enter Sub Category">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Subtotal</label>
                                            <input type="text" class="form-control" id="update_subtotal" placeholder="Please Enter Category">
                                        </div>


                                        

                                        <script>
                                                  function addvb(){
                                                                                var v1a = parseFloat(document.getElementById("update_price").value);
                                                                                var v2a = parseFloat(document.getElementById("update_quantity").value); 
                                                                                var v3a = parseFloat(document.getElementById("update_discount").value);                                                                          
                                                                            
                                                                            
                                                                                document.getElementById("update_subtotal").value = (v1a-(v3a*0.01)*v1a)*v2a;
                                                                        

                                                                            }

                                            </script>
               

                                   
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" onclick="updateDetails()" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="hidden" id="hiddendata">
                                </div>
                                </div>
                            </div>
                        </div>

            <!-- End Modal -->

<div class="row">
    

    

    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h5>Products</h5>
                                <ol class="breadcrumb p-0 bg-transparent mb-2">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Goods</a></li>
                                    <li class="breadcrumb-item active">Transactions</li>
                                </ol>
                            </div>
                        </div>

                                            

                    </div>

                                    <div class="row">


                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="prod_nm">Commodity</label>
                                                        <select class="form-select" aria-label="Default select example" id="commodity_main">

                                                                <option value=''>All</option>

                                                                <?php  
                                                                $sql = "SELECT * FROM comm_posnew GROUP BY comm";
                                                                $query = mysqli_query($conn, $sql);
                                                                ?>

                                                                <?php foreach($query as $q){ ?>  
                                                                    <option value='<?php echo $q ['comm'];?>'><?php echo $q ['comm'];?></option>                                                
                                                                <?php } ?>
                                
                                                           
                                                            
                                                        </select>        
                                                        
                                                        
                                                    </div>
                                                </div>        

                                        


                                                

                                        </div>

            <div id="type_purchase">
                <div class="row">
                    <?php  

                        $date_f = date('Y/m/d');
                        $date_t = date('H:i:s');
                        $date_m = date('m');
                        $date_d = date('d');
                        $date_y = date('Y');

                    ?>

                        <?php
                        $query1 = mysqli_query($conn,"SELECT * FROM comm_posnew ORDER BY comm ASC");
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
                                    <p class="text-muted font-size-13">Farmgate</p>

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
                                                url:"transactionsupplyview.php",
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
                    <!-- end row -->
</div>     
                                   

<script>
     function addproduct(){
                                var trans_comm= $('#trans_comm').val();
                                var trans_type= $('#trans_type').val();
                                var trans_sellingtype= $('#trans_sellingtype').val();
                                var trans_class= $('#trans_class').val();
                                var trans_price= $('#trans_price').val();
                                var trans_volume= $('#trans_volume').val();
                                var trans_date= $('#trans_date').val();
                                var trans_year= $('#trans_year').val();
                                var trans_month= $('#trans_month').val();
                                var trans_day= $('#trans_day').val();
                                var trans_time= $('#trans_time').val();
                                var trans_encoder= $('#trans_encoder').val();
                                var trans_commitvol= $('#trans_commitvol').val();

                               

                                        $.ajax({
                                                url:"transactionsupplyinsert.php",
                                                method:"POST",
                                                data:{trans_commitvol:trans_commitvol,trans_comm:trans_comm,trans_type:trans_type,trans_sellingtype:trans_sellingtype,trans_class:trans_class,trans_price:trans_price,trans_volume:trans_volume,trans_date:trans_date,
                                                    trans_year:trans_year,trans_month:trans_month,trans_day:trans_day,trans_time:trans_time,trans_encoder:trans_encoder},
                                                success:function(data,status){
                                                
                                                    $('#exampleModal').modal('hide');                                               
                                                    displayData();
                                                    
                                                }
                                            });
                            }

                            

                            function DeleteUser(deleteid){
                                                                      
                                if(confirm("Are you sure you want to delete this data?")){
                                    $.ajax({
                                                url:"transactionsupplytransdelete.php",
                                                method:"POST",
                                                data:{deleteid:deleteid},
                                                success:function(data,status){
                                                    window.location.reload();                                                
                                                    displayData();
                                                }
                                            });
                                        }
                                       
                            }

</script>


                                                <script>
                                                    $(document).ready(function(){

                                                    $('#commodity_main').change(function(){
                                                
                                                      
                                                        var commodity_main = $('#commodity_main').val();                                                   
                                                            $.ajax({
                                                                url:"transactionsupplyfetch.php",
                                                                method:"POST",
                                                                data:{commodity_main:commodity_main},
                                                                success:function(data){
                                                                    $('#type_purchase').html(data);
                                                                }
                                                            });
                                                    
                                                    });
                                                
                                                    });
                                                </script>

                                          


                    <script>

                            $(document).ready(function(){
                                displayData();
                            })

                            function displayData(){
                                    var displayData="true";
                                    $.ajax({
                                        url:"transactionsupplydisplay.php",
                                        type:"POST",
                                        data:{
                                            displaySend:displayData
                                        },
                                        success:function(data,status){
                                            $('#displayDataTable').html(data);
                                        }
                                    });
                            }


                            function filterData(){
                                        var maincat = $('#maincat').val();
                                        var subcat = $('#subcat').val();

                                            $.ajax({
                                                url:"goodscatdisplayfilter.php",
                                                method:"POST",
                                                data:{maincat:maincat, subcat:subcat},
                                                success:function(data){
                                                    $('#displayDataTable').html(data);
                                                }
                                            });
                            }



                   
                            $(document).ready(function(){
                                $('.edittrans').click(function(){
                                    var userid = $(this).data('id');
                                   
                                  alert(userid)

                                })
                            })



                            function GetDetails(updateid){
                                $('#hiddendata').val(updateid);
                                $.post("salestransupdate.php",{updateid:updateid},function(data,status){
                                    var cat_id=JSON.parse(data);

                                
                                    $('#update_discount').val(cat_id.trans_disc);
                                    $('#update_quantity').val(cat_id.trans_qnty);
                                    $('#update_subtotal').val(cat_id.trans_subtot);
                                  
                               
                                });

                                $('#updateModal').modal('show');               
                                    
                            }


                            function updateDetails(){
                                var update_quantity=$('#update_quantity').val();
                                var update_discount=$('#update_discount').val();
                                var update_subtotal=$('#update_subtotal').val();
                                var hiddendata=$('#hiddendata').val();

                                $.post("salestransupdate.php",{update_subtotal:update_subtotal,update_quantity:update_quantity,update_discount:update_discount,hiddendata:hiddendata},function(data,status){
                                    $('#updateModal').modal('hide'); 
                                    displayData();    
                               
                                });

                            }
                         
                            

                            
                                           
                            </script>

                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <h5 class="mb-0">Transaction</h5>
            </div>

            
                            <div class="p-4">
                                    <h5 class="font-size-14 mb-3">Collection</h5>                

                                    <form action="transactionsupplyincoming.php" method="POST" enctype="multipart/form-data">
                                        <div id="displayDataTable">

                                      


                                        </div>

                                       <table>
                                          
                                       <hr>
                                              
                                                <tr>
                                                    <td >Name:</td>
                                                    <td colspan="4"> <select class="form-select transpartner_1 transpartner_2" name="trans_partner" id="transpartner_1">
                                                        <option value="">Please Select Name</option>
                                                            <?php  
                                                                $sql = "SELECT * FROM registrationhubpos WHERE type='Farmer' GROUP BY fname";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>
                                                             <?php foreach($query as $q){ ?>  
                                                                <option value="<?php echo $q ['fname'];?>"><?php echo $q ['fname'];?></option>
                                                            <?php } ?>
                                                        
                                                        </select>     
                                                    </td>
                                                    <script>
                                                        $(document).ready(function(){

                                                        $('.transpartner_1').change(function(){
                                                    
                                                            var transpartner_1 = $('.transpartner_1').val();                                                    
                                                                $.ajax({
                                                                    url:"transactionsupplyfetchpartner.php",
                                                                    method:"POST",
                                                                    data:{transpartner_1:transpartner_1},
                                                                    success:function(data){
                                                                        $('.code_01').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('.transpartner_2').change(function(){
                                                    
                                                            var transpartner_2 = $('.transpartner_2').val();                                                    
                                                                $.ajax({
                                                                    url:"transactionsupplyfetchpartner.php",
                                                                    method:"POST",
                                                                    data:{transpartner_2:transpartner_2},
                                                                    success:function(data){
                                                                        $('.type_01').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>
                                               
                                                </tr>


                                               <tr>
                                                
                                                    <td>Partner Code</td>
                                                    <td> <select id="trans_partnercode" name="trans_partnercode" class="form-select code_01">
                                                            <option value="">Partner Code*</option>
                                                            </select> </td>
                                            
                                                </tr>

                                                <tr>
                                                
                                                    <td>Partner Type</td>
                                                    <td> <select id="trans_partnertype" name="trans_partnertype" class="form-select type_01">
                                                            <option value="">Type of Partner *</option>
                                                            </select> </td>
                                            
                                                </tr>
                                                                                                         
                                                           
                                                        

                                                <tr>
                                                    <td >Date:</td>
                                                    <td colspan="4"> <input class="form-control" name="trans_adate" type="date" >   
                                                    </td>

                                               
                                                </tr>

                                                <tr>
                                                    <td >Status:</td>
                                                    <td colspan="4"> <select class="form-select" name="trans_status" id="trans_status_01">
                                                      
                                                        <option value="Pending">Pending</option>
                                                        <option value="Paid">Paid</option>
                                                        <option value="Receivable">Receivable</option>
                                                        <option value="Payable">Payable</option>
                                                        </select>     
                                                    </td>

                                               
                                                </tr>


                                                

                                               <!-- <tr>
                                                    <td >Amount Paid:</td>
                                                    <td colspan="4"><input class="form-control" name="recam" type="text" placeholder="Please Enter Amount Paid *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Date of Payment:</td>
                                                    <td colspan="4"><input class="form-control" name="redtp" type="date"></td>
                                                </tr> -->

                                            

                                            

                                            

                                       </table>
                                    
                               

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3" >
                                        <div class="commo">                                                   
                                            <input type="submit" style="width:100%;" name="submit_incoming" value='Save' class="btn btn-success waves-effect waves-light">
                                        </div>                                        
                                    </div>
                                </div>  
                            </div>  
                            
                        </div>
                                </form>
               
                               



        </div>
    </div>



</div>
<!-- end row -->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->


<?php include_once 'footer.php';?>