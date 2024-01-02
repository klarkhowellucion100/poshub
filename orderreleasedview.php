<?php include 'heading.php'; ?>




<?php
if (isset($_GET['view']) && isset($_GET['partner'])) {
    include_once 'db.inc.php';
   
   $trans_code = $_GET['view'];
   $partner = $_GET['partner'];
}

   ?>






<?php

$date_f = date('Y-m-d');
$date_t = date('H:i:s');
$date_m = date('m');
$date_d = date('d');
$date_y = date('Y');
?>




<div class="row" >
                        <div class="col-6 mx-auto">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0" >Order Detail</h4>
                                <a class='btn btn-primary' href="orderrelease.php" style="margin-top: 20px;"> Exit </a> 
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Receipt</a></li>
                                        <li class="breadcrumb-item active">Order Detail</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Released Volume</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modal2">
                                 



                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick=updateproduct()>Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>


                  

                    

                    <div class="row" id="printarea_01">
                        <div class="col-lg-6 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                  

                               

                                    <div class="row">
                                        
                                                <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT * FROM transactionsdrhubpos WHERE (trans_code LIKE '%$trans_code%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                   
                                                    <input type="date" style='display:none;' id="date_price" value='<?php echo $result1['trans_adate'];?>'>
                                                <?php endwhile; ?> 

                                    <div>
                                        <h4 style="color:darkblue;">Transaction No.: <?php echo $trans_code;?></h4>
                                        <h4 style="color:darkblue;">Name: <?php echo $partner;?></h4>
                                        <h5 style="font-size:12px; color:darkblue;">Order Summary</h5> <button class="btn btn-primary addproduct" data-bs-toggle="modal" data-bs-target="#myModal01"><i class="uil-plus"></i></button>
                                   


                                          <!-- sample modal content -->
                                           <div id="myModal01" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Order</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">

                                                                <div class="mb-3" style='display:none;'>
                                                                    <label for="cfull" class="form-label">Code</label>
                                                                    <input type="text" class="form-control" id="ftrans_code" value="<?php echo $trans_code;?>">
                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="cfull" class="form-label">Selling Type</label>
                                                                    <input type="text" class="form-control stype_1 stype_2 stype_3 stype_4 stype_5" id="trans_sellingtype" value="Wholesale">
                                                                </div>

                                                               

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <div class="commo">
                                                                        <label for="region">Commodity Type</label>                                                       
                                                                            <select id="trans_type" class="form-select commt_1 commt_2 commt_3 commt_4 commt_5">
                                                                            <option value="">Pease Select Commodity *</option>
                                                                                <?php  
                                                                                    $sql = "SELECT * FROM comm_pospricenew GROUP BY `comm_type_f`";
                                                                                    $query = mysqli_query($conn, $sql);
                                                                                ?>
                                                                                <?php foreach($query as $q){ ?>  
                                                                                    <option value="<?php echo $q ['comm_type_f'];?>"><?php echo $q ['comm_type_f'];?></option>
                                                                                <?php } ?>
                                                                            </select> 
                                                                            </div>                                        
                                                                    </div>
                                                                </div> 

                                                                    <script>
                                                                        $(document).ready(function(){

                                                                        $('.commt_1').change(function(){
                                                                    
                                                                            var commt_1 = $('.commt_1').val();    
                                                                            var date_price1 = document.getElementById('date_price').value;                                              
                                                                                $.ajax({
                                                                                    url:"orderreleasedviewfetch.php",
                                                                                    method:"POST",
                                                                                    data:{commt_1:commt_1,date_price1:date_price1},
                                                                                    success:function(data){
                                                                                        $('.comm_1').html(data);
                                                                                    }
                                                                                });
                                                                        
                                                                        });
                                                                    
                                                                        });
                                                                    </script>

                                                                                                    
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <div class="commo">
                                                                        <label for="province">Commodity Name</label>                                                       
                                                                            <select id="trans_comm" class="form-select comm_1  comm_2 comm_3 comm_4 comm_5">
                                                                            <option value="">Please Select Commodity *</option>
                                                                            </select> 
                                                                            </div>                                        
                                                                    </div>
                                                                </div> 

                                                                <script>
                                                                        $(document).ready(function(){

                                                                        $('#trans_comm').change(function(){
                                                                        
                                                                            var comm_2 = document.getElementById('trans_comm').value;
                                                                            var date_price2 = document.getElementById('date_price').value;                                                 
                                                                                $.ajax({
                                                                                    url:"orderreleasedviewfetch.php",
                                                                                    method:"POST",
                                                                                    data:{comm_2:comm_2,date_price2:date_price2},
                                                                                    success:function(data){
                                                                                        $('.comm_class_price').html(data);
                                                                                    }
                                                                                });
                                                                        
                                                                        });
                                                                    
                                                                        });
                                                                </script>

                                                             

                                                                <div class='comm_class_price'>

                                                                <!--CONTENT FOR PRICE AND CLASS-->

                                                                </div>

                                                                
                                                                <div class="mb-3">
                                                                    <label for="cfull" class="form-label">Volume</label>
                                                                    <input type="text" class="form-control" id="trans_volume" placeholder="Enter Volume(kg)">
                                                                </div>

                                                                    


                                                             


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" onclick=addcomm()>Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->


                                        <div class="table-responsive">
                                            <table class="table-centered table table-wrap mb-0" style="width:100%;" >
                                             
                                                <tbody>

                                                <tr>
                                                     
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:darkblue;">Comm</th>        
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:darkblue;">Class</th>     
                                                        <th style="width: 100px; font-size:12px; font-weight: bold; color:darkblue;">Price</th>    
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:darkblue;">Com</th>    
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:darkblue;">Act</th>                            
                                                        <th  style="width: 50px;  font-size:12px; font-weight: bold; color:darkblue;">Sub</th>
                                                        <th  style="width: 50px;  font-size:12px; font-weight: bold; color:darkblue;">Update</th>
                                                        <th  style="width: 50px;  font-size:12px; font-weight: bold; color:darkblue;">Delete</th>
                                                      
                                                </tr>

                                                    <?php
                                                        include 'db.inc.php';
                                                        $query2 = mysqli_query($conn,"SELECT * FROM viewfinal_subtot WHERE (ftrans_code LIKE '%$trans_code%')");
                                                        while($result2 = mysqli_fetch_array($query2)): ?>

                                                    <tr >
                                                    <td style='display:none;'><input type="text" class="comm_value" value='<?php echo $result2['trans_comm'];?>'></td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;"><?php echo $result2['trans_comm'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;"><?php echo $result2['trans_class'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;">P<?php echo $result2['trans_price'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;"><?php echo $result2['trans_commitvol'];?>kg</td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;"><?php echo $result2['trans_volume'];?>kg</td>
                                                        <td style="width: 50px;  font-size:11px; color:darkblue;">P <?php echo number_format($result2['pay_subtotal_final'], 2);?></td>
                                                        <td><button class="btn btn-warning productinfo" data-id="<?php echo $result2['trans_id'];?>"><i class="uil-edit-alt"></i></button></td>                                                        
                                                        <td><button class="btn btn-danger" onclick="DeleteUser(<?php echo $result2['trans_id'];?>)" id="delete_bot"><i class="uil-trash-alt"></i></button></td>
                                                        
                                                    </tr>

                                                  

                                                    <?php endwhile; ?>


                                                    <?php
                                                        include 'db.inc.php';
                                                        $query3 = mysqli_query($conn,"SELECT SUM(pay_subtotal_final) FROM viewfinal_subtot WHERE (ftrans_code LIKE '%$trans_code%')");
                                                        while($result3 = mysqli_fetch_array($query3)): ?>
                                         
                                                    <tr>

                                                    <input type="hidden" value="<?php echo $trans_code; ?>" id="code_trans">
                                                        <td  colspan="5" style="font-size:15px; color:darkblue; font-weight:bold; margin-bottom: 20px; text-align: right;">Total</td>
                                                        <td colspan="3" style="font-size:15px; color:darkblue; margin-bottom: 20px; text-align: right;">
                                                            <h4 style="font-size:15px; color:darkblue;">P <?php echo number_format($result3['SUM(pay_subtotal_final)'], 2);?></h4>
                                                        </td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td colspan="8" style="text-align: center;"></td>                                                        
                                                    </tr>
                                                   
                                                    <?php endwhile; ?>

                                                

                                                    <script>         
                                                          
                                                        $(document).ready(function () {
                                                                $('.productinfo').click(function () {
                                                                    var comm = $(this).data('id');
                                                                    var date_price = $('#date_price').val();

                                                                    // Find the closest comm_value element related to the clicked button
                                                                    var comm_value3 = $(this).closest('tr').find('.comm_value').val();

                                                                    $.ajax({
                                                                        url: "orderreleaseddetails.php",
                                                                        method: "POST",
                                                                        data: { comm: comm, date_price: date_price, comm_value3: comm_value3 },
                                                                        success: function (data) {
                                                                            $('#modal2').html(data);
                                                                            $('#exampleModal').modal('show');
                                                                        }
                                                                    });
                                                                });
                                                            });


                                                        function DeleteUser(deleteid){
                                                                      
                                                                      if(confirm("Are you sure you want to delete this data?")){
                                                                          $.ajax({
                                                                                      url:"orderreleaseddelete.php",
                                                                                      method:"POST",
                                                                                      data:{deleteid:deleteid},
                                                                                      success:function(data,status){
                                                                                          window.location.reload();                                                
                                                                                          
                                                                                      }
                                                                                  });
                                                                              }
                                                                             
                                                                  }
                                                    </script>
                                                    

                                                    <script>
                                                         function updateproduct(){
                                                                var trans_id= $('#trans_id').val();
                                                                var trans_price= $('#trans_price').val();
                                                                var trans_volume= $('#trans_volume').val();                                                           

                                                            

                                                                        $.ajax({
                                                                                url:"orderreleasedinsert.php",
                                                                                method:"POST",
                                                                                data:{trans_id:trans_id,trans_price:trans_price,trans_volume:trans_volume},
                                                                                success:function(data,status){
                                                                                
                                                                                    $('#exampleModal').modal('hide');                                               
                                                                                    window.location.reload();
                                                                                    
                                                                                }
                                                                            });
                                                            }
                                                    </script>


                                                    <script>
                                                         function addcomm(){
                                                                var ftrans_code= $('#ftrans_code').val();
                                                                var trans_sellingtype= $('#trans_sellingtype').val();
                                                                var trans_type= $('#trans_type').val();  
                                                                
                                                                var trans_comm= $('#trans_comm').val(); 
                                                                var trans_class= $('#trans_class').val(); 
                                                                var trans_price= $('#trans_price').val(); 
                                                                var trans_volume= $('#trans_volume').val(); 

                                                            

                                                                        $.ajax({
                                                                                url:"orderreleasedadditional.php",
                                                                                method:"POST",
                                                                                data:{ftrans_code:ftrans_code,trans_sellingtype:trans_sellingtype,trans_type:trans_type,trans_comm:trans_comm,trans_class:trans_class,trans_price:trans_price,trans_volume:trans_volume},
                                                                                success:function(data,status){
                                                                                
                                                                                    $('#myModal01').modal('hide');                                               
                                                                                    window.location.reload();
                                                                                    
                                                                                }
                                                                            });
                                                            }
                                                    </script>


                                                </tbody>
                                            </table>
                                        </div>
                                   
                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                            <a onclick="printPage()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                              <!--  <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                  
                    

                  
<script>
    function printPage(){
        var printarea_01 = document.getElementById('printarea_01').innerHTML;
     
        window.print();
    }
</script>






<?php include 'footer.php'; ?>