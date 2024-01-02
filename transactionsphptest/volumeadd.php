



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
                                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
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
                                                        <label for="prod_nm">Type</label>
                                                        <select class="form-select" aria-label="Default select example" id="type_main">

                                                                <option value=''>All</option>

                                                            <?php  
                                                                $sql = "SELECT * FROM commodity GROUP BY `type`";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>

                                                            <?php foreach($query as $q){ ?>  
                                                                <option value='<?php echo $q ['type'];?>'><?php echo $q ['type'];?></option>                                                
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
                        $query1 = mysqli_query($conn,"SELECT * FROM commodity ORDER BY commodity ASC");
                        while($q = mysqli_fetch_array($query1)): ?>


                        <?php
                        
                        //$add_prod_file = $q['add_prod_file'];

                        ?>
                        <div class="col-xl-4 col-sm-6">
                            <div class="product-box">
                                <div class="product-img pt-4 px-4">
                                    <div class="product-ribbon badge bg-warning">
                                        <?php echo $q['type']; ?>
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
                                                url:"volumeaddview.php",
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
                                var encoder= $('#encoder').val();
                                var dcom= $('#dcom').val();
                                var dcoty= $('#dcoty').val();
                                var dunt= $('#dunt').val();
                                var deuw= $('#deuw').val();
                                var dund= $('#dund').val();
                                var drate= $('#drate').val();

                                var cmonth= $('#cmonth').val();
                                var cday= $('#cday').val();
                                var cyear= $('#cyear').val();
                                var ctime= $('#ctime').val();
                                var cfull= $('#cfull').val();

                                        $.ajax({
                                                url:"volumetransinsert.php",
                                                method:"POST",
                                                data:{encoder:encoder,dcom:dcom,dcoty:dcoty,dunt:dunt,deuw:deuw,dund:dund,drate:drate,cmonth:cmonth,cday:cday,cyear:cyear,ctime:ctime,cfull:cfull},
                                                success:function(data,status){
                                                
                                                    $('#exampleModal').modal('hide');                                               
                                                    displayData();
                                                    
                                                }
                                            });
                            }

                            

                            function DeleteUser(deleteid){
                                                                      
                                if(confirm("Are you sure you want to delete this data?")){
                                    $.ajax({
                                                url:"volumetransdelete.php",
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

                                                    $('#type_main').change(function(){
                                                
                                                        var type_main = $('#type_main').val();                                                    
                                                            $.ajax({
                                                                url:"volumetransfilter.php",
                                                                method:"POST",
                                                                data:{type_main:type_main},
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
                                        url:"volumetransdisplay.php",
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

                                    <form action="volumetransactionsincoming.php" method="POST" enctype="multipart/form-data">
                                        <div id="displayDataTable">

                                      


                                        </div>

                                       <table>
                                          
                                       <hr>
                                                <tr>
                                                    <td style="color: royalblue; font-size: 15px; font-weight: bold;">Supplier Details</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td >Name of Supplier:</td>
                                                    <td colspan="4"><input class="form-control" name="nname" type="text" placeholder="Please Enter Name of Supplier *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Date of Delivery:</td>
                                                    <td colspan="4"><input class="form-control" name="ndtdr" type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td >Time of Arrival:</td>
                                                    <td colspan="4"><input class="form-control" name="ntmar" type="time"></td>
                                                </tr>

                                                
                                                <tr>
                                                    <td style="color: royalblue; font-size: 15px; font-weight: bold;">Address</td>
                                                </tr>

                                                <tr>
                                                    <td >Region:</td>
                                                    <td colspan="4"> <select class="form-select region_0" name="nadreg" id="mainreg">
                                                        <option value="">Please Select Region</option>
                                                            <?php  
                                                                $sql = "SELECT * FROM areas GROUP BY region";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>
                                                             <?php foreach($query as $q){ ?>  
                                                                <option value="<?php echo $q ['region'];?>"><?php echo $q ['region'];?></option>
                                                            <?php } ?>
                                                        
                                                        </select>     
                                                    </td>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('#mainreg').change(function(){
                                                    
                                                            var mainreg = $('#mainreg').val();                                                    
                                                                $.ajax({
                                                                    url:"volumeaddfetch.php",
                                                                    method:"POST",
                                                                    data:{mainreg:mainreg},
                                                                    success:function(data){
                                                                        $('#mainprov').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>
                                                </tr>


                                                <tr>
                                                    <td >Province:</td>
                                                    <td colspan="4"> 
                                                        <select class="form-select province_0" name="naprov" id="mainprov">
                                                            <option value="">Please Select Province</option>
                                                        </select>     
                                                    </td>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('.province_0').change(function(){
                                                    
                                                            var region_0 = $('.region_0').val();   
                                                            var province_0 = $('.province_0').val();                                                 
                                                                $.ajax({
                                                                    url:"volumeaddfetch.php",
                                                                    method:"POST",
                                                                    data:{province_0:province_0,region_0:region_0},
                                                                    success:function(data){
                                                                        $('#mainmun').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>
                                                </tr>

                                                <tr>
                                                    <td >Municipality/City:</td>
                                                    <td colspan="4"> 
                                                        <select class="form-select" name="namun" id="mainmun">                                                         
                                                            <option value="">Please Select Municipality/City</option>
                                                        </select>     
                                                    </td>

                                                    
                                                </tr>

                                                <tr>
                                                    <td >Barangay:</td>
                                                    <td colspan="4"><input class="form-control" name="nabrgy" type="text" placeholder="Please Enter Barangay *"></td>
                                                </tr>

                                                <tr>
                                                    <td style="color: royalblue; font-size: 15px; font-weight: bold;">Origin</td>
                                                </tr>

                                                <tr>
                                                    <td >Region:</td>
                                                    <td colspan="4"> <select class="form-select region_01" name="npreg" id="mainreg1">
                                                        <option value="">Please Select Region</option>
                                                            <?php  
                                                                $sql = "SELECT * FROM areas GROUP BY region";
                                                                $query = mysqli_query($conn, $sql);
                                                            ?>
                                                             <?php foreach($query as $q){ ?>  
                                                                <option value="<?php echo $q ['region'];?>"><?php echo $q ['region'];?></option>
                                                            <?php } ?>
                                                        
                                                        </select>     
                                                    </td>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('#mainreg1').change(function(){
                                                    
                                                            var mainreg1 = $('#mainreg1').val();                                                    
                                                                $.ajax({
                                                                    url:"volumeaddfetch.php",
                                                                    method:"POST",
                                                                    data:{mainreg1:mainreg1},
                                                                    success:function(data){
                                                                        $('#mainprov1').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>
                                                </tr>


                                                <tr>
                                                    <td >Province:</td>
                                                    <td colspan="4"> 
                                                        <select class="form-select province_01" name="npprv" id="mainprov1">
                                                            <option value="">Please Select Province</option>
                                                        </select>     
                                                    </td>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('.province_01').change(function(){
                                                    
                                                            var region_01 = $('.region_01').val();   
                                                            var province_01 = $('.province_01').val();                                                 
                                                                $.ajax({
                                                                    url:"volumeaddfetch.php",
                                                                    method:"POST",
                                                                    data:{province_01:province_01,region_01:region_01},
                                                                    success:function(data){
                                                                        $('#mainmun1').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>
                                                </tr>

                                                <tr>
                                                    <td >Municipality/City:</td>
                                                    <td colspan="4"> 
                                                        <select class="form-select" name="npmun" id="mainmun1">                                                         
                                                            <option value="">Please Select Municipality/City</option>
                                                        </select>     
                                                    </td>

                                                    
                                                </tr>

                                                <tr>
                                                    <td >Barangay:</td>
                                                    <td colspan="4"><input class="form-control" name="npbrg" type="text" placeholder="Please Enter Barangay *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Contact No.:</td>
                                                    <td colspan="4"><input class="form-control" name="ncont" type="text" placeholder="Please Enter Contact Number *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Vehicle Type:</td>
                                                    <td colspan="4"><input class="form-control" name="nvehi" type="text" placeholder="Please Enter Vehicle Type *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Vehicle Plate No:</td>
                                                    <td colspan="4"><input class="form-control" name="nvenu" type="text" placeholder="Please Enter Vehicle Plate No. *"></td>
                                                </tr>


                                                

                                               <!-- <tr>
                                                    <td >Amount Paid:</td>
                                                    <td colspan="4"><input class="form-control" name="recam" type="text" placeholder="Please Enter Amount Paid *"></td>
                                                </tr>

                                                <tr>
                                                    <td >Date of Payment:</td>
                                                    <td colspan="4"><input class="form-control" name="redtp" type="date"></td>
                                                </tr> -->

                                                <tr>
                                                    <td >Inspector:</td>
                                                    <td colspan="4"><input class="form-control" name="redtp" type="text"   <?php if($usertype=="Employee"){ echo "readonly"; };?> value="<?php echo $userprofile;?>"></td>
                                                </tr>

                                                <tr>
                                                    <td >Upload File:</td>
                                                    <td colspan="4"><input class="form-control" name="file" type="file"></td>
                                                </tr>

                                            

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