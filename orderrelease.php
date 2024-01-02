<?php include_once 'heading.php';?>
<?php $yearnow=date('Y'); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



<!--################################################################################################################### FOR ADMIN VIEW (START) #####################################################################################-->


    <?php
$date_f = date('Y-m-d');
?>


    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Search</h4>
                                    <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="datefrom">Delivery Date (From)</label>
                                                                <input type="date" class="form-control" id="datefrom">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="dateto">Delivery Date (To)</label>
                                                                <input type="date" class="form-control" id="dateto">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                  

                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="dateto">Filter</label>
                                                                <button type="button" onclick="filter()" id="filter001" class="btn btn-primary form-control">Filter</button>
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                    <script>
                                                        $(document).ready(function(){

                                                        $('#filter001').click(function(){
                                                    
                                                            var datefrom = $('#datefrom').val();      
                                                            var dateto = $('#dateto').val();  
                                                                                            
                                                                $.ajax({
                                                                    url:"orderreleasedfetch.php",
                                                                    method:"POST",
                                                                    data:{datefrom:datefrom,dateto:dateto},
                                                                    success:function(data){
                                                                        $('#dashboardmain').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>

                                                   

                                                </div>
                                           
                                        </div>

                                    </div>

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->
    <div id="dashboardmain">
                    



                  
                    <div class="row">

                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Deliveries   
                                 

                                <table id="table_collect" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                     <thead>
                                         <tr>
                                             
                                                <th>Name</th> 
                                                <th>Dr No.</th>         
                                                <th>Transaction Date</th>  
                                                <th>Amount</th>                                                 
                                                <th>Delete</th>    
                                          
                                         </tr>
                                     </thead>


                                     <tbody>
                                         <?php
                                             include 'db.inc.php';
                                             $query001 = mysqli_query($conn,"SELECT trans_code, trans_partner, trans_partnercode, trans_partnertype, trans_adate, trans_status, ftrans_encoder, SUM(pay_subtotal_final) FROM erp_record WHERE trans_partnertype='Vendor' AND trans_adate='$date_f' GROUP BY trans_code");
                                             while($result001 = mysqli_fetch_array($query001)): ?>
                                         <tr>
                                                <td><?php echo $result001 ['trans_partner']; ?></td> 
                                                <td><a href="orderreleasedview.php?view=<?php echo $result001 ['trans_code'];?>&&partner=<?php echo $result001 ['trans_partner'];?>"><?php echo $result001 ['trans_code']; ?></a></td>  
                                                <td><?php echo $result001 ['trans_adate']; ?></td>        
                                                <td><?php echo $result001 ['SUM(pay_subtotal_final)']; ?></td> 
                                                <td> <a onClick="deleteme('delete=<?php echo $result001 ['trans_code'];?>')" class="btn  btn-raised btn-danger waves-effect">Delete</a></td> 

                                                <script>
                                                    function deleteme(delid){
                                                        if(confirm("Are you sure you want to delete this data?")){
                                                        window.location.href='orderreleasedeletetable.php?' +delid+ '';
                                                        return true;
                                                        }
                                                        }
                                                </script> 
                                              
                                                         
                                         </tr>
                                             <?php endwhile; ?>

                                     </tbody>
                                 </table>

                                 <script>
                                    $(document).ready(function () {
                                            $('#table_collect').DataTable();
                                        });
                                 </script>

                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>


                    
            </div>

<!--################################################################################################################### FOR ADMIN VIEW (END) ######################################################################################-->




<?php include_once 'footer.php';?>