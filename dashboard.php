<?php include_once 'heading.php';?>


<?php
include 'db.inc.php';

//session
$uid = $_SESSION['id'];
$time = "Active now";

$query=mysqli_query($conn, "UPDATE usertablehubpos SET status='Active now' WHERE id=$uid");
// echo '-------------------------------------'.$userprofile;

//echo $time;


?>


<?php
$date_f = date('Y-m-d');
?>


<div class="container-fluid">

<?php $yearnow=date('Y'); ?>

                    <!-- start page title -->
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
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Search</h4>
                                    <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-xl-5">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="datefrom">Delivery Date (From)</label>
                                                                <input type="date" class="form-control" id="datefrom">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-5">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="dateto">Delivery Date (To)</label>
                                                                <input type="date" class="form-control" id="dateto">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-xl-2">
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
                                                                    url:"dashboardfetch.php",
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
                        <div class="col-md-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(sales) FROM sales_purchase_final WHERE trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales2 = $result['SUM(sales)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales2, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Total Sales </p>
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
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal_final) FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpurchase2 = $result['SUM(pay_subtotal_final)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumpurchase2, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Total Purchase </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->


                       

                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>
                                <?php
                                    include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subcom_final) FROM all_transactions_hubpos WHERE trans_partnertype='Vendor' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumcomven = $result['SUM(pay_subcom_final)'];                                                               
                                                ?>
                                               

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumcomven, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Expected Sales </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subcom_final) FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumcofar = $result['SUM(pay_subcom_final)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumcofar, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Expected Purchase </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(volume) FROM targetvolhubpos WHERE `date`='$date_f'");
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
                        <!-- end col-->

                        

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(trans_commitvol) FROM all_transactions_hubpos WHERE trans_partnertype='Vendor' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $commvolumesold = $result['SUM(trans_commitvol)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo number_format($commvolumesold, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Exp Volume Sold</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <?php endwhile; ?> 

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: green; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(trans_commitvol) FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $commvolumepur = $result['SUM(trans_commitvol)'];                                                               
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

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php 
                                                                include_once 'db.inc.php';
                                                                $qr02 = "SELECT COUNT(trans_code) FROM all_transactions_hubpos WHERE trans_commitvol!='0' AND trans_partnertype='Farmer' AND trans_adate='$date_f' GROUP BY trans_partner";
                                                                $result02 = mysqli_query($conn,$qr02);
                                                                $numRow02 = mysqli_num_rows($result02);
                                                            ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo $numRow02;?></span></h4>
                                        <p class="text-muted mb-0">Exp Farmers to Deliver</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn, "SELECT SUM(pay_subtotal_final) FROM all_transactions_hubpos WHERE trans_partnertype='Vendor' AND trans_adate='$date_f' AND trans_status='Paid'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales = $result['SUM(pay_subtotal_final)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Cash Sales </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal_final) FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f' AND trans_status='Paid'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpurchase = $result['SUM(pay_subtotal_final)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"><?php echo number_format($sumpurchase, 2);?></span></h4>
                                        <p class="text-muted mb-0"> Cash Purchase </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(volume) FROM targetvolhubpos WHERE `date`='$date_f'");
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
                        <!-- end col-->

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(trans_volume) FROM all_transactions_hubpos WHERE trans_partnertype='Vendor' AND trans_adate='$date_f' ");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $volumesold = $result['SUM(trans_volume)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo number_format($volumesold, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0">Total Volume Sold</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                        <?php endwhile; ?> 

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(trans_volume) FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $volumeprocessed = $result['SUM(trans_volume)'];                                                               
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

                        <div class="col-md-6 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php 
                                                                include_once 'db.inc.php';
                                                                $qr02a = "SELECT COUNT(trans_code) FROM all_transactions_hubpos WHERE trans_volume!='0' AND trans_partnertype='Farmer' AND trans_adate='$date_f' GROUP BY trans_partner";
                                                                $result02a = mysqli_query($conn,$qr02a);
                                                                $numRow02a = mysqli_num_rows($result02a);
                                                            ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo $numRow02a;?></span></h4>
                                        <p class="text-muted mb-0">Farmers Delivered</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
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

                                  

                                   
                                            <?php  $sql001 = "SELECT trans_partner, trans_partnertype, SUM(trans_commitvol), SUM(trans_volume) FROM all_transactions_hubpos WHERE trans_adate='$date_f' AND trans_partnertype='Farmer' GROUP BY trans_partner";
                                                    $query001 = mysqli_query($conn, $sql001);
                                                ?>

                                         <script>
                                             
                                                var options = {
                                                series: [{
                                                name: 'Commitment',
                                                data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['SUM(trans_commitvol)'];?>, <?php } ?>]
                                                }, {
                                                name: 'Actual',
                                                data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['SUM(trans_volume)'];?>, <?php } ?>]
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

                                  

                                   
                                            <?php  $sql002 = "SELECT trans_comm, SUM(trans_commitvol), SUM(trans_volume) FROM all_transactions_hubpos WHERE trans_adate='$date_f' AND trans_partnertype='Farmer' GROUP BY trans_comm";
                                                    $query002 = mysqli_query($conn, $sql002);
                                                ?>

                                         <script>
                                             
                                                var options = {
                                                series: [{
                                                name: 'Commitment',
                                                data: [<?php foreach($query002 as $q002){ ?>
                                                                    <?php echo $q002['SUM(trans_commitvol)'];?>, <?php } ?>]
                                                }, {
                                                name: 'Actual',
                                                data: [<?php foreach($query002 as $q002){ ?>
                                                                    <?php echo $q002['SUM(trans_volume)'];?>, <?php } ?>]
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
                                                            $query1 = mysqli_query($conn,"SELECT trans_partner, trans_comm, trans_commitvol, trans_volume, trans_volume-trans_commitvol AS diff  FROM all_transactions_hubpos WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
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
                                    <h4 class="card-title mb-4">Orders (Order vs. Actual)</h4>
                                   
                                    <!-- Tab panes -->

                                  <div id='table_commodity_commit'>
                                                <div class="table-responsive">
                                                    <table id="myTable" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
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
                                                            $query1 = mysqli_query($conn,"SELECT trans_partner, trans_comm, trans_commitvol, trans_volume, trans_volume-trans_commitvol AS diff  FROM all_transactions_hubpos WHERE trans_partnertype='Vendor' AND trans_adate='$date_f'");
                                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                                            <tr>
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
                                    <h4 class="card-title mb-4">Inventory</h4>
                                
                                    <!-- Tab panes -->

                                <div id='table_commodity_commit'>
                                                <div class="table-responsive">
                                                    <table id="myTable01" style="width:100%;" class="display table table-striped table-bordered wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Commodity</th>
                                                                <th>Purchased</th>
                                                                <th>Sold</th>
                                                                <th>Balance</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include 'db.inc.php';
                                                            $query101 = mysqli_query($conn,"SELECT *  FROM comm_inv_final");
                                                            while($result101 = mysqli_fetch_array($query101)): ?>
                                                            <tr>
                                                                <td><?php echo $result101 ['trans_comm'];?></td> 
                                                                <td style="text-align: right;"><?php echo number_format($result101 ['purchase'],2);?> kg</td>   
                                                                <td style="text-align: right;"><?php echo number_format($result101 ['sold'], 2);?> kg</td>    
                                                                <td style="text-align: right;"><?php echo number_format($result101 ['running_inv'], 2);?> kg</td>                                                         
                                                            </tr>      
                                                            <?php endwhile; ?>                                                  
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <script>
                                                        $(document).ready(function() {
                                                            $('#myTable01').DataTable( {
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


</div>   
                    


</div>
<!-- container-fluid -->




<?php include_once 'footer.php'; ?>



    
                 

                    
