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


    <div id="dashboardmain">
                    
                    <div class="row">

                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Commodity Pricing   <div style='width: 50%;'><input type="date" id='changeDate' class='form-control'></div> <br>
                                 
                            <div class='table-responsive' id='table-overallview'>
                            <table id="table_collect2" class="table table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style="text-align: center; vertical-align: middle; background-color: #FFADAD; color: #432616;">Commodity</th>
                                            <th colspan="4" style="text-align: center; vertical-align: middle; background-color: green; color: white;">Farmgate Price</th>
                                            <th colspan="4" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Wholesale Price</th>
                                            <th colspan="1" style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;">Social Retail Price</th>
                                            <th rowspan="3" style="text-align: center; vertical-align: middle; background-color: #DEDAF4; color: #432616;">Prevailing Market Price (Php/kg)</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle; background-color: green; color: white;">Static (Php/kg)</th>
                                            <th colspan="3" style="text-align: center; vertical-align: middle; background-color: green; color: white;">Dynamic (Php/kg)</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Static (Php/kg)</th>
                                            <th colspan="3" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Dynamic (Php/kg)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;">Dynamic (Php/kg)</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle; background-color: green; color: white;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class B</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class C</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class B</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class C</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #63C5DA; color: black;">Class A</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'db.inc.php';
                                        $query001 = mysqli_query($conn, "SELECT * FROM comm_pospricenew WHERE comm_date_f='$date_f' ORDER BY comm_f ASC");
                                        while ($result001 = mysqli_fetch_array($query001)) :
                                        ?>
                                            <tr>
                                                <?php
                                                $comm_fgp_f = $result001['comm_fgp_f'];
                                                $comm_fgp_fb = $comm_fgp_f * 0.75;
                                                $comm_fgp_fc = $comm_fgp_f * 0.50;

                                                $comm_wsp_f = $result001['comm_wsp_f'];
                                                $comm_wsp_fb = $comm_wsp_f * 0.75;
                                                $comm_wsp_fc = $comm_wsp_f * 0.50;

                                                $comm_srp_f = $result001['comm_srp_f'];

                                                $comm_prod = $result001['comm_prod'];
                                                $comm_fgp_markup = (($comm_fgp_f - $comm_prod) / $comm_prod) * 100;

                                                $comm_priv = $result001['comm_priv'];
                                                ?>
                                                <td style='background-color: #FFADAD; color: #432616;'><div id='comm_f'><?php echo $result001['comm_f']; ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: green; color: white;"><div id='comm_fgp'><?php echo number_format($result001['comm_fgp'], 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_f'><?php echo number_format($comm_fgp_f, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_fb'><?php echo number_format($comm_fgp_fb, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_fc'><?php echo number_format($comm_fgp_fc, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #DA9100; color: white;"><div id='comm_wsp'><?php echo number_format($result001['comm_wsp'], 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_f'><?php echo number_format($comm_wsp_f, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_fb'><?php echo number_format($comm_wsp_fb, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_fc'><?php echo number_format($comm_wsp_fc, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #63C5DA; color: black;"><div id='comm_srp_f'><?php echo number_format($comm_srp_f, 2); ?></div></td>
                                                <td style="text-align: right; vertical-align: middle; background-color: #DEDAF4; color: #432616;"><div id='comm_priv'><?php echo number_format($comm_priv, 2); ?></div></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                     
                             

                                </table>

                                 </div>

                                 <script>
                                    $(document).ready(function(){

                                    $('#changeDate').change(function(){
                                
                                        var changeDate = $('#changeDate').val();                                                                          
                                            $.ajax({
                                                url:"priceboardfetch.php",
                                                method:"POST",
                                                data:{changeDate:changeDate},
                                                success:function(data){
                                                    $('#table-overallview').html(data);
                                                }
                                            });
                                    
                                    });
                                
                                    });
                                </script>
                           


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




                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>


                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                                <h4 class="card-title">Commodity Pricing   
                             

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            
                                                <th>Commodity</th>                                         
                                                <th>FGP (Static)</th>  
                                                <th>WSP (Static)</th>                                            
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