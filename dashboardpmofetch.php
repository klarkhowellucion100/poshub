<?php


include 'db.inc.php';

if(isset($_POST['datefrom']) && isset($_POST['dateto'])){ ?>


<?php 

$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];


?>




<div class="row">


                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(volume) FROM targetvolhubpos WHERE (`date` BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumtarvol = $result['SUM(volume)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo number_format($sumtarvol, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Target Volume</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: green; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(farmer_commitment) FROM orders_commitment_actual WHERE  (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $commvolumepur = $result['SUM(farmer_commitment)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo number_format($commvolumepur, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Exp Volume Purchase</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <?php endwhile; ?> 

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(actual_delivery) FROM orders_commitment_actual WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $volumeprocessed = $result['SUM(actual_delivery)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo number_format($volumeprocessed, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Total Volume Processed</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: blue; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(released) FROM hubpos_inventory WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $volumesold = $result['SUM(released)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo number_format($volumesold, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Total Volume Sold</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
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
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                            <?php 
                                                include 'db.inc.php';
                                                $query = mysqli_query($conn,  "SELECT COUNT(trans_partner) FROM farmers_delivery WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                                while($result = mysqli_fetch_array($query)): ?>
                                                    <?php                                                            
                                                        $numRow02 = $result['COUNT(trans_partner)'];  
                                                
                                            ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo $numRow02;?></span></h4>
                                        <p class="text-muted mb-0">Exp Farmers to Deliver</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
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
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                        <?php 
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT COUNT(trans_partner) FROM farmers_delivery WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto') AND total_volume!='0'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $numRow02a = $result['COUNT(trans_partner)'];  
                                            
                                        ?>

                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo $numRow02a;?></span></h4>
                                        <p class="text-muted mb-0">Farmers Who Delivered</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
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
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_sales) FROM hub_pos_sales WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales2 = $result['SUM(total_sales)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales2, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Total Sales </p>
                                        <?php endwhile; ?> 

                                        <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_sales) FROM hub_pos_sales WHERE trans_status='Paid' AND (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales2a = $result['SUM(total_sales)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales2a, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Sales </p>
                                        <?php endwhile; ?> 

                                        <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_sales) FROM hub_pos_sales WHERE trans_status='Pending' AND (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales2b = $result['SUM(total_sales)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales2b, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Receivable </p>
                                        <?php endwhile; ?> 
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                        <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_purchase) FROM hub_pos_purchase WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpurchase2 = $result['SUM(total_purchase)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumpurchase2, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Total Purchase </p>
                                        <?php endwhile; ?> 

                                        <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_purchase) FROM hub_pos_purchase WHERE trans_status='Paid' AND (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpurchase2a = $result['SUM(total_purchase)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumpurchase2a, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Purchase </p>
                                        <?php endwhile; ?>

                                        <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(total_purchase) FROM hub_pos_purchase WHERE trans_status='Pending' AND (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpurchase2b = $result['SUM(total_purchase)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumpurchase2b, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Payable </p>
                                        <?php endwhile; ?>



                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                          
                        </div>
                        <!-- end col-->

                        


                       

                        
                    </div>

                    
                        

                    

                    <div class="row">

                        
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Deliveries (Commitment vs Actual)</h4>

                             
                                <div>
                                    <div id='chart_commit'></div>

                                  

                                   
                                            <?php  $sql001 = "SELECT * FROM commitment_delivered_farmer WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')";
                                                    $query001 = mysqli_query($conn, $sql001);
                                                ?>

                                         <script>
                                             
                                                var options = {
                                                series: [{
                                                name: 'Commitment',
                                                data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['commitment'];?>, <?php } ?>]
                                                }, {
                                                name: 'Actual',
                                                data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['delivered'];?>, <?php } ?>]
                                                }],
                                                chart: {
                                                type: 'bar',
                                                height: 350
                                                },
                                                plotOptions: {
                                                bar: {
                                                    horizontal: false,
                                                    columnWidth: '55%',
                                                    endingShape: 'rounded'
                                                },
                                                },
                                                dataLabels: {
                                                enabled: false
                                                },
                                                stroke: {
                                                show: true,
                                                width: 2,
                                                colors: ['transparent']
                                                },
                                                xaxis: {
                                                categories: [<?php foreach($query001 as $q001){ ?>
                                                                    '<?php echo $q001['trans_partner'];?>', <?php } ?>],
                                                },
                                                yaxis: {
                                                title: {
                                                    text: 'kg (kilograms)'
                                                }
                                                },
                                                fill: {
                                                opacity: 1
                                                },
                                                tooltip: {
                                                y: {
                                                    formatter: function (val) {
                                                    return val + " kg"
                                                    }
                                                }
                                                }
                                                };

                                                var chart = new ApexCharts(document.querySelector("#chart_commit"), options);
                                                chart.render();
                                            
      
                                       </script>
                                              

                                               
                                            
                                                
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                                        

                                        
                                      

                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="col-xl-6">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Commodity (Committed vs. Actual)</h4>
                                   
                                    <!-- Tab panes -->
                                    <div id='chart_commodity'></div>

                                  

                                   
                                            <?php  $sql002 = "SELECT * FROM commitment_delivered_comm WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')";
                                                    $query002 = mysqli_query($conn, $sql002);
                                                ?>

                                         <script>
                                             
                                                var options = {
                                                series: [{
                                                name: 'Commitment',
                                                data: [<?php foreach($query002 as $q002){ ?>
                                                                    <?php echo $q002['commitment'];?>, <?php } ?>]
                                                }, {
                                                name: 'Actual',
                                                data: [<?php foreach($query002 as $q002){ ?>
                                                                    <?php echo $q002['delivered'];?>, <?php } ?>]
                                                }],
                                                chart: {
                                                type: 'bar',
                                                height: 350
                                                },
                                                plotOptions: {
                                                bar: {
                                                    horizontal: false,
                                                    columnWidth: '55%',
                                                    endingShape: 'rounded'
                                                },
                                                },
                                                dataLabels: {
                                                enabled: false
                                                },
                                                stroke: {
                                                show: true,
                                                width: 2,
                                                colors: ['transparent']
                                                },
                                                xaxis: {
                                                categories: [<?php foreach($query002 as $q002){ ?>
                                                                    '<?php echo $q002['trans_comm'];?>', <?php } ?>],
                                                },
                                                yaxis: {
                                                title: {
                                                    text: 'kg (kilograms)'
                                                }
                                                },
                                                fill: {
                                                opacity: 1
                                                },
                                                tooltip: {
                                                y: {
                                                    formatter: function (val) {
                                                    return val + " kg"
                                                    }
                                                }
                                                }
                                                };

                                                var chart = new ApexCharts(document.querySelector("#chart_commodity"), options);
                                                chart.render();
                                            
      
                                       </script>
                                    

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end Col -->
                    </div>
                    <!-- end row-->


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Deliveries (Commitment vs Actual)</h4>

                             
                                <div>
                                    <div id='table_farmer_commit'>
                                                <div class="table-responsive">
                                                    <table id="myTable2" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Farmer</th>
                                                                <th>Commodity</th>
                                                                <th>Commitment</th>
                                                                <th>Delivered</th>
                                                                <th>Diff</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include 'db.inc.php';
                                                            $query1 = mysqli_query($conn,"SELECT * FROM commitment_delivered_table WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
                                                                <td><?php echo date('F d, Y', strtotime($result1['trans_adate'])); ?></td>
                                                                <td><?php echo $result1 ['trans_partner'];?></td>
                                                                <td style="text-align: left;"><?php echo $result1 ['trans_comm'];?></td>  
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['trans_commitvol']);?> kg</td>   
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['trans_volume'], 2);?> kg</td>    
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['diff']);?> kg</td>                                                         
                                                            </tr>      
                                                            <?php endwhile; ?>                                                  
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                            $('#myTable2').DataTable( {
                                                                dom: 'Bfrtip',
                                                                buttons: [
                                                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                                                ]
                                                            } );
                                                        } );
                                                    </script>
                                    </div>

                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                                        
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="col-xl-6">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Orders (Ordered vs. Received)</h4>
                                   
                                    <!-- Tab panes -->

                                  <div id='table_commodity_commit'>
                                                <div class="table-responsive">
                                                    <table id="myTable" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Market</th>
                                                                <th>Commodity</th>
                                                                <th>Ordered</th>
                                                                <th>Received</th>
                                                                <th>Diff</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include 'db.inc.php';
                                                            $query1 = mysqli_query($conn,"SELECT * FROM order_receive_table WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
                                                                <td><?php echo date('F d, Y', strtotime($result1['trans_adate'])); ?></td>
                                                                <td><?php echo $result1 ['trans_partner'];?></td>
                                                                <td style="text-align: left;"><?php echo $result1 ['trans_comm'];?></td>  
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['trans_commitvol']);?> kg</td>   
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['trans_volume'], 2);?> kg</td>    
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['diff']);?> kg</td>                                                         
                                                            </tr>      
                                                            <?php endwhile; ?>                                                  
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                            $('#myTable').DataTable( {
                                                                dom: 'Bfrtip',
                                                                buttons: [
                                                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                                                ]
                                                            } );
                                                        } );
                                                    </script>
                                  </div>

                                   
                                          

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end Col -->
                    </div>
                    <!-- end row-->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Inventory (Per Date)</h4>

                             
                                <div>
                                    <div id='table_farmer_commit'>
                                                <div class="table-responsive">
                                                    <table id="myTable3" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Commodity</th>
                                                                <th>Received</th>
                                                                <th>Released</th>
                                                                <th>Remaining</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include 'db.inc.php';
                                                            $query1 = mysqli_query($conn,"SELECT * FROM hubpos_inventory WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto')");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
                                                                <td><?php echo date('F d, Y', strtotime($result1['trans_adate'])); ?></td>
                                                                <td style="text-align: left;"><?php echo $result1 ['trans_comm'];?></td>  
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['received']);?> kg</td>   
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['released'], 2);?> kg</td>    
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['remaining_inv']);?> kg</td>                                                         
                                                            </tr>      
                                                            <?php endwhile; ?>                                                  
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                            $('#myTable3').DataTable( {
                                                                dom: 'Bfrtip',
                                                                buttons: [
                                                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                                                ]
                                                            } );
                                                        } );
                                                    </script>
                                    </div>

                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                                        
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Inventory (Overall)</h4>

                             
                                <div>
                                    <div id='table_farmer_commit'>
                                                <div class="table-responsive">
                                                <table id="myTable4" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
                                                            
                                                                <th>Commodity</th>
                                                                <th>Received</th>
                                                                <th>Released</th>
                                                                <th>Remaining</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include 'db.inc.php';
                                                            $query1 = mysqli_query($conn,"SELECT trans_comm, SUM(received) AS received_sum, SUM(released) AS released_sum, SUM(remaining_inv) AS remaining_inv_sum FROM hubpos_inventory WHERE (trans_adate BETWEEN '$datefrom' AND '$dateto') GROUP BY trans_comm");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
                                                                <td style="text-align: left;"><?php echo $result1 ['trans_comm'];?></td>  
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['received_sum']);?> kg</td>   
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['released_sum'], 2);?> kg</td>    
                                                                <td style="text-align: right;"><?php echo number_format($result1 ['remaining_inv_sum']);?> kg</td>                                                         
                                                            </tr>      
                                                            <?php endwhile; ?>                                                  
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                            $('#myTable4').DataTable( {
                                                                dom: 'Bfrtip',
                                                                buttons: [
                                                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                                                ]
                                                            } );
                                                        } );
                                                    </script>
                                    </div>

                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                                        
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->


</div>   
                    

<?php } ?>

