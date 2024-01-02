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


                        <!-- Start Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Partial Payment</h5>
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
                                                                    url:"listdemandfetch.php",
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
                                 

                                <table id="table_collect2" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                     <thead>
                                         <tr>
                                             
                                            <th>Market Channel</th>
                                            <th>Commodity</th>
                                            <th>Order</th>                                              
                                                <!--<th>Delete</th>  -->  
                                          
                                         </tr>
                                     </thead>


                                     <tbody>
                                         <?php
                                             include 'db.inc.php';
                                             $query001 = mysqli_query($conn,"SELECT trans_partner, trans_comm, trans_commitvol, trans_volume, trans_volume-trans_commitvol AS diff  FROM erp_record WHERE trans_partnertype='Vendor' AND trans_adate='$date_f'");
                                             while($result001 = mysqli_fetch_array($query001)): ?>
                                         <tr>

                                        <td><?php echo $result001 ['trans_partner'];?></td>
                                        <td style="text-align: left;"><?php echo $result001 ['trans_comm'];?></td>  
                                        <td style="text-align: right;"><?php echo number_format($result001 ['trans_commitvol']);?> kg</td>   
                        
                                                         
                                         </tr>
                                             <?php endwhile; ?>

                                     </tbody>
                                 </table>

                                 <script>         
                                $(document).ready(function(){
                                $('.productinfo').click(function(){
                                    var commodityid = $(this).data('id');
                                   
                                    $.ajax({
                                                url:"transactionorderview.php",
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

                                 <script>
                                    $(document).ready(function () {
                                            $('#table_collect2').DataTable();
                                        });
                                 </script>




                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>


                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
            </div>

<!--################################################################################################################### FOR ADMIN VIEW (END) ######################################################################################-->

<!--################################################################################################################### FOR EMPLOYEE VIEW (START) ######################################################################################-->
<?php if($usertype=="Employee"){?>

                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                   
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    
                                </div>
                                <div>

                                <?php
                                        include 'db.inc.php';
                                        $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND redtp='$userprofile'");
                                        while($result = mysqli_fetch_array($query)): ?>
                                            <?php                                                            
                                                $sumsales = $result['SUM(pay_subtotal)'];                                                               
                                            ?>

                                    <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales, 2);?></span></h4>
                                    <p class="text-muted mb-0">  Total Collection </p>
                                </div>
                                <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                </p>-->
                            </div>
                        </div>
                        <?php endwhile; ?> 
                    </div>
                    <!-- end col-->

                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end mt-2">
                                   
                                        <i class="uil-graph-bar" style="color: green; font-size: 30px;"></i>
                                    
                                </div>
                                <div>

                                <?php
                                        include 'db.inc.php';
                                        $query = mysqli_query($conn,  "SELECT SUM(vol_subtot) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND redtp='$userprofile'");
                                        while($result = mysqli_fetch_array($query)): ?>
                                            <?php                                                            
                                                $sumvol = $result['SUM(vol_subtot)'];                                                               
                                            ?>

                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup"> <?php echo number_format($sumvol, 2);?></span> kg</h4>
                                    <p class="text-muted mb-0">  Total Volume </p>
                                </div>
                                <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                </p>-->
                            </div>
                        </div>
                        <?php endwhile; ?> 
                    </div>
                    <!-- end col-->
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Deliveries   
                             

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            
                                                <th>Delivery Date</th>                                         
                                                <th>Time</th>  
                                                <th>Dr No.</th>                                            
                                                <th>Collector</th>     
                                                <th>Supplier</th>                                          
                                                <th>Address</th>                                              
                                                <th>Delete</th>                    
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            include 'db.inc.php';
                                            $query1 = mysqli_query($conn,"SELECT * FROM drvolume WHERE redtp='$userprofile' GROUP BY recno ORDER BY ndtdr DESC");
                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                        <tr>

                                                             
                                            <td><?php echo $result1 ['ndtdr']; ?></td>                                                 
                                            <td><?php echo $result1 ['ntmar']; ?></td>
                                            <td><a href="receiptviewtransaction.php?view=<?php echo $result1 ['recno'];?>"><?php echo $result1 ['recno']; ?></a></td>                                    
                                            <td><?php echo $result1 ['redtp']; ?></td>                                                  
                                            <td><?php echo $result1 ['nname']; ?></td> 
                                            <td><?php echo $result1 ['nadreg']; ?> <?php echo $result1 ['naprov']; ?> <?php echo $result1 ['nabrgy']; ?></td>  
                                            <td> <a onClick="deleteme('delete=<?php echo $result1 ['recno'];?>&&deletefile=rec/<?php echo $result1 ['file'];?>')" class="btn  btn-raised btn-danger waves-effect">Delete</a></td> 

                                            <script>
                                                function deleteme(delid){
                                                    if(confirm("Are you sure you want to delete this data?")){
                                                    window.location.href='volumeviewdelete.php?' +delid+ '';
                                                    return true;
                                                    }
                                                    }
                                            </script> 
                                                        
                                        </tr>
                                            <?php endwhile; ?>

                                    </tbody>
                                </table>

                               
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
<?php } ?>


<?php include_once 'footer.php';?>