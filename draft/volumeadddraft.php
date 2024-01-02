



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
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <h5 class="mb-0">Transaction</h5>
            </div>

            
                            <div class="p-4">
                                    <h5 class="font-size-14 mb-3">Selling</h5>
<?php 
        $date_f = date('Y-m-d');
        $date_t = date('H:i:s');
        $date_m = date('m');
        $date_d = date('d');
        $date_y = date('Y');

        function createRandomPassword() {
            $chars = "003232303232023232023456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $pass = '' ;
            while ($i <= 7) {
        
                $num = rand() % 33;
        
                $tmp = substr($chars, $num, 1);
        
                $pass = $pass . $tmp;
        
                $i++;
        
            }
            return $pass;
        }
        $finalcode='DR-'.date('m').'-'.date('d').'-'.date('Y').'-'.createRandomPassword();


?>
                            

                                    <form action="volumetransactionsincoming.php" method="POST" enctype="multipart/form-data">
                                        <div id="displayDataTable">

                                      


                                        </div>

                                        <input type="text" class="form-control" id="code" name='code[]' value="<?php echo $finalcode;?>">

                                        <input type="text" class="form-control" id="mday" name='mday[]' value="<?php echo $date_m;?>">
                                        <input type="text" class="form-control" id="mmonth" name='mmonth[]' value="<?php echo $date_d;?>">
                                        <input type="text" class="form-control" id="myear" name='myear[]' value="<?php echo $date_y;?>">
                                        <input type="text" class="form-control" id="mtime" name='mtime[]' value="<?php echo $date_t;?>">
                                        <input type="text" class="form-control" id="mfull" name='mfull[]' value="<?php echo $date_f;?>">
                                        
                                        <div class="col-md-12">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nname">Name of Supplier</label>
                                                            <input type="text" class="form-control" id="nname" name='nname[]' placeholder="Please Enter Name of Supplier *">
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="orgn">Delivery Date</label>
                                                            <input type="date" class="form-control" id="ndtdr" name='ndtdr[]'>
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="ntmar">Delivery Time</label>
                                                            <input type="time" class="form-control" id="ntmar" name='ntmar[]'>
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nestc">Estimated Cargo Weight</label>
                                                            <input type="text" class="form-control" id="nestc" name='nestc[]' placeholder="Please Enter Estimate Cargo Weight *">
                                                        </div>                                             
                                                    </div>
                                                </div>
                                            
                                        <h5 style='color:royalblue; font-size: 15px;'>Address</h5>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="region">Region</label>
                                                                <select class="form-select" id="region" name="nadreg[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="province">Province</label>
                                                                <select class="form-select" id="province" name="naprov[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="city">City/Municipality</label>
                                                                <select class="form-select" id="city" name="namun[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="barangay">Barangay</label>
                                                                <select class="form-select" id="barangay" name="nabrgy[]"></select>                                
                                                </div>
                                            </div>

                                            <h5 style='color:royalblue; font-size: 15px;'>Point of Origin</h5>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="region2">Region</label>
                                                                <select class="form-select" id="region2" name="npreg[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="province2">Province</label>
                                                                <select class="form-select" id="province2" name="npprv[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="city2">City/Municipality</label>
                                                                <select class="form-select" id="city2" name="npmun[]"></select>                                
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="barangay2"2>Barangay</label>
                                                                <select class="form-select" id="barangay2" name="npbrg[]"></select>                                
                                                </div>
                                            </div>


                                            
                                            <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
                                            <script type="text/javascript">                                            
                                                var my_handlers = {

                                                    fill_provinces:  function(){

                                                        var region_code = $(this).val();
                                                        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                                                        
                                                    },

                                                    fill_cities: function(){

                                                        var province_code = $(this).val();
                                                        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                                                    },


                                                    fill_barangays: function(){

                                                        var city_code = $(this).val();
                                                        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                                                    }
                                                };

                                                var my_handlers2 = {

                                                fill_provinces2:  function(){

                                                    var region_code2 = $(this).val();
                                                    $('#province2').ph_locations('fetch_list', [{"region_code": region_code2}]);
                                                    
                                                },

                                                fill_cities2: function(){

                                                    var province_code2 = $(this).val();
                                                    $('#city2').ph_locations( 'fetch_list', [{"province_code": province_code2}]);
                                                },


                                                fill_barangays2: function(){

                                                    var city_code2 = $(this).val();
                                                    $('#barangay2').ph_locations('fetch_list', [{"city_code": city_code2}]);
                                                }
                                                };

                                            
                                                $(function(){
                                                    $('#region').on('change', my_handlers.fill_provinces);
                                                    $('#province').on('change', my_handlers.fill_cities);
                                                    $('#city').on('change', my_handlers.fill_barangays);

                                                    $('#region').ph_locations({'location_type': 'regions'});
                                                    $('#province').ph_locations({'location_type': 'provinces'});
                                                    $('#city').ph_locations({'location_type': 'cities'});
                                                    $('#barangay').ph_locations({'location_type': 'barangays'});

                                                    $('#region').ph_locations('fetch_list');

                                                    $('#region2').on('change', my_handlers2.fill_provinces2);
                                                        $('#province2').on('change', my_handlers2.fill_cities2);
                                                        $('#city2').on('change', my_handlers2.fill_barangays2);

                                                        $('#region2').ph_locations({'location_type': 'regions'});
                                                        $('#province2').ph_locations({'location_type': 'provinces'});
                                                        $('#city2').ph_locations({'location_type': 'cities'});
                                                        $('#barangay2').ph_locations({'location_type': 'barangays'});

                                                        $('#region2').ph_locations('fetch_list');



                                                });
                                            </script>

                                



                                            <div class="col-md-12">
                                                    <div class="mb-3">                                                        
                                                    <div class="mb-1 position-relative">
                                                        <label class="form-label" for="ncont">Contact Number</label>
                                                        <input type="text" class="form-control" id="ncont" name='ncont[]' placeholder="Please Enter Contact Number *">
                                                    </div>                                             
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="mb-3">                                                        
                                                    <div class="mb-1 position-relative">
                                                        <label class="form-label" for="nvehi">Vehicle Make and Model</label>
                                                        <input type="text" class="form-control" id="nvehi" name='nvehi[]' placeholder="Please Enter Vehicle Type *">
                                                    </div>                                             
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="mb-3">                                                        
                                                    <div class="mb-1 position-relative">
                                                        <label class="form-label" for="nvenu">Vehicle Plate Number</label>
                                                        <input type="text" class="form-control" id="nvenu" name='nvenu[]' placeholder="Please Enter Contact Number *">
                                                    </div>                                             
                                                </div>
                                            </div>

                               

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
                                                        <select class="form-select" aria-label="Default select example" id="store_main">

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

            <div id="store_purchase">
                <div class="row">
                    <?php  

                        $date_f = date('Y/m/d');
                        $date_t = date('H:i:s');
                        $date_m = date('m');
                        $date_d = date('d');
                        $date_y = date('Y');

                    ?>

                        <?php
                        $query1 = mysqli_query($conn,"SELECT * FROM commodity");
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

                                        $.ajax({
                                                url:"volumetransinsert.php",
                                                method:"POST",
                                                data:{encoder:encoder,dcom:dcom,dcoty:dcoty,dunt:dunt,deuw:deuw,dund:dund,drate:drate},
                                                success:function(data,status){
                                                
                                                    $('#exampleModal').modal('hide');                                               
                                                    displayData();
                                                    
                                                }
                                            });
                            }

                            

                            function DeleteUser(deleteid){
                                                                      
                                if(confirm("Are you sure you want to delete this data?")){
                                    $.ajax({
                                                url:"salestransactionsdelete.php",
                                                method:"POST",
                                                data:{deleteid:deleteid},
                                                success:function(data,status){
                                                
                                                    displayData();
                                                }
                                            });
                                        }
                                       
                            }

</script>


                                                <script>
                                                    $(document).ready(function(){

                                                    $('#store_main').change(function(){
                                                
                                                        var store_main = $('#store_main').val();                                                    
                                                            $.ajax({
                                                                url:"salestransactionsstore.php",
                                                                method:"POST",
                                                                data:{store_main:store_main},
                                                                success:function(data){
                                                                    $('#store_purchase').html(data);
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

</div>
<!-- end row -->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->


<?php include_once 'footer.php';?>