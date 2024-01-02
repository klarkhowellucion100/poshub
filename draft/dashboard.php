<?php include_once 'heading.php';?>


<?php
include 'db.inc.php';

//session
$uid = $_SESSION['id'];
$time = "Active now";

$query=mysqli_query($conn, "UPDATE usertable SET status='Active now' WHERE id=$uid");
// echo '-------------------------------------'.$userprofile;

//echo $time;


?>



<div class="container-fluid">

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
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal) FROM com_vol_mon");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumsales = $result['SUM(pay_subtotal)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1">Php <span data-plugin="counterup"> <?php echo number_format($sumsales, 2);?></span></h4>
                                        <p class="text-muted mb-0">  Total Income </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
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
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT SUM(vol_subtot) FROM com_vol_mon");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumvolume = $result['SUM(vol_subtot)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo number_format($sumvolume, 2);?></span> kg</h4>
                                        <p class="text-muted mb-0"> Total Volume </p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
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
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                                            <?php 
                                                                include_once 'db.inc.php';
                                                                $qr01 = "SELECT COUNT(id) FROM com_vol_mon GROUP BY dcom";
                                                                $result01 = mysqli_query($conn,$qr01);
                                                                $numRow01 = mysqli_num_rows($result01);
                                                            ?>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $numRow01;?></span></h4>
                                        <p class="text-muted mb-0">Total Commodity Types</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: violet; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                                        <?php 
                                                                include_once 'db.inc.php';
                                                                $qr02 = "SELECT COUNT(id) FROM com_vol_mon GROUP BY nname";
                                                                $result02 = mysqli_query($conn,$qr02);
                                                                $numRow02 = mysqli_num_rows($result02);
                                                            ?>
                                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup"><?php echo $numRow02;?></span></h4>
                                        <p class="text-muted mb-0"><a href="pendingrequestsongoing.php">Total Suppliers Involved</a></p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>

                    <div class="row">

                        


                      


                    </div>
                    <!-- end row-->


                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Income and Volume Trend</h4>

                                    <?php  $sql2 = "SELECT SUM(pay_subtotal) FROM com_vol_mon GROUP BY dcom";
                                    $query2 = mysqli_query($conn, $sql2);
                                    ?>

                                    <div class="mt-3">

                                    <div id="chart"></div>

                                            <?php  $sql001 = "SELECT SUM(pay_subtotal), SUM(vol_subtot) FROM com_vol_mon GROUP BY ndtdr";
                                                    $query001 = mysqli_query($conn, $sql001);
                                                ?>

                                        <?php  $sql002 = "SELECT ndtdr FROM com_vol_mon GROUP BY ndtdr";
                                                    $query002 = mysqli_query($conn, $sql002);
                                                ?>
                                        <script>
                                            
                                            var options = {
                                            series: [   {
                                                            name: "Income",
                                                            data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['SUM(pay_subtotal)'];?>, <?php } ?>]
                                                        },

                                                        {
                                                            name: "Volume",
                                                            data: [<?php foreach($query001 as $q001){ ?>
                                                                    <?php echo $q001['SUM(vol_subtot)'];?>, <?php } ?>]
                                                        },
                                        
                                                ],
                                            chart: {
                                            height: 350,
                                            type: 'line',
                                            zoom: {
                                                enabled: false
                                            }
                                            },
                                            dataLabels: {
                                            enabled: false
                                            },
                                            stroke: {
                                            curve: 'straight'
                                            },
                                            title: {
                                            text: '',
                                            align: 'left'
                                            },
                                            grid: {
                                            row: {
                                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                                opacity: 0.5
                                            },
                                            },
                                            xaxis: {
                                            categories: [<?php foreach($query002 as $q002){ ?>
                                                                    '<?php echo $q002['ndtdr'];?>', <?php } ?>],
                                            }
                                            };

                                            var chart = new ApexCharts(document.querySelector("#chart"), options);
                                            chart.render();
                                        </script>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="col-xl-4">
                            

                            <div class="card">
                                <div class="card-body">
                                  

                                    <h4 class="card-title mb-4">Top Products</h4>


                                  

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end Col -->
                    </div>
                    <!-- end row-->


                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h4 class="card-title mb-4">Volume Trend</h4>

                                    <?php  $sql2 = "SELECT SUM(pay_subtotal) FROM com_vol_mon GROUP BY dcom";
                                    $query2 = mysqli_query($conn, $sql2);
                                    ?>

                                    <div class="mt-3">

                                    <div id="chart1"></div>

                                            
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->

                        <div class="col-xl-4">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-sm-8">
                                            <p class="text-white font-size-18">Go to our <b>Main</b> page <i class="mdi mdi-arrow-right"></i></p>
                                            <div class="mt-4">
                                                <a href="index.php" class="btn btn-success waves-effect waves-light">Proceed!</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <img src="assets/images/setup-analytics-amico.svg" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->

                            <div class="card">
                                <div class="card-body">
                                    

                                    <h4 class="card-title mb-4">Top Selling Products</h4>


                                  
                               

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end Col -->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end">
                                        <div class="dropdown">
                                            <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">All Members<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item" href="#">Locations</a>
                                                <a class="dropdown-item" href="#">Revenue</a>
                                                <a class="dropdown-item" href="#">Join Date</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">Top Users</h4>

                                    <div data-simplebar style="max-height: 339px;">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-centered table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 20px;"><img src="assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Glenn Holden</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Nevada</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-danger font-size-12">Cancel</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-success" data-feather="trending-up"></i>$250.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-5.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Lolita Hamill</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Texas</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-success font-size-12">Success</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>$110.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-6.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Robert Mercer</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> California</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-info font-size-12">Active</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-success" data-feather="trending-up"></i>$420.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Marie Kim</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Montana</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-warning font-size-12">Pending</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>$120.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-8.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Sonya Henshaw</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Colorado</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-info font-size-12">Active</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-success" data-feather="trending-up"></i>$112.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-2.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Marie Kim</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> Australia</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-success font-size-12">Success</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-danger" data-feather="trending-down"></i>$120.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-1.jpg" class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>
                                                            <h6 class="font-size-15 mb-1 fw-normal">Sonya Henshaw</h6>
                                                            <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-map-marker"></i> India</p>
                                                        </td>
                                                        <td><span class="badge bg-soft-danger font-size-12">Cancel</span></td>
                                                        <td class="text-muted fw-semibold text-end"><i class="icon-xs icon me-2 text-success" data-feather="trending-up"></i>$112.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- enbd table-responsive-->
                                    </div>
                                    <!-- data-sidebar-->
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Recent<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                                                <a class="dropdown-item" href="#">Recent</a>
                                                <a class="dropdown-item" href="#">By Users</a>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Recent Activity</h4>

                                    <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 339px;">
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <p class="text-muted mb-1 font-size-13">Today<small class="d-inline-block ms-1">12:20 pm</small></p>
                                                <p class="mb-0">Andrei Coman magna sed porta finibus, risus posted a new article: <span class="text-primary">Forget UX
                                                            Rowland</span></p>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <p class="text-muted mb-1 font-size-13">22 Jul, 2020 <small class="d-inline-block ms-1">12:36 pm</small></p>
                                            <p class="mb-0">Andrei Coman posted a new article: <span class="text-primary">Designer Alex</span></p>
                                        </li>
                                        <li class="feed-item">
                                            <p class="text-muted mb-1 font-size-13">18 Jul, 2020 <small class="d-inline-block ms-1">07:56 am</small></p>
                                            <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented <span class="text-primary"> Developer Moreno</span></p>
                                        </li>
                                        <li class="feed-item">
                                            <p class="text-muted mb-1 font-size-13">10 Jul, 2020 <small class="d-inline-block ms-1">08:42 pm</small></p>
                                            <p class="mb-0">Zack Wetass, Chris combined Commented <span class="text-primary">UX Murphy</span></p>
                                        </li>

                                        <li class="feed-item">
                                            <p class="text-muted mb-1 font-size-13">23 Jun, 2020 <small class="d-inline-block ms-1">12:22 am</small></p>
                                            <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented <span class="text-primary"> Developer Moreno</span></p>
                                        </li>
                                        <li class="feed-item pb-1">
                                            <p class="text-muted mb-1 font-size-13">20 Jun, 2020 <small class="d-inline-block ms-1">09:48 pm</small></p>
                                            <p class="mb-0">Zack Wetass, Chris combined Commented <span class="text-primary">UX Murphy</span></p>
                                        </li>

                                    </ol>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">

                                    <div class="float-end">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton4">
                                                <a class="dropdown-item" href="#">Yearly</a>
                                                <a class="dropdown-item" href="#">Monthly</a>
                                                <a class="dropdown-item" href="#">Weekly</a>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title">Social Source</h4>

                                    <div class="text-center">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <span class="avatar-title rounded-circle bg-soft-primary font-size-24">
                                                        <i class="mdi mdi-facebook text-primary"></i>
                                                    </span>
                                        </div>
                                        <p class="font-16 text-muted mb-2"></p>
                                        <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a></h5>
                                        <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus tincidunt.</p>
                                        <a href="#" class="text-reset font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <div class="social-source text-center mt-3">
                                                <div class="avatar-xs mx-auto mb-3">
                                                    <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                                <i class="mdi mdi-facebook text-white"></i>
                                                            </span>
                                                </div>
                                                <h5 class="font-size-15">Facebook</h5>
                                                <p class="text-muted mb-0">125 sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="social-source text-center mt-3">
                                                <div class="avatar-xs mx-auto mb-3">
                                                    <span class="avatar-title rounded-circle bg-info font-size-16">
                                                                <i class="mdi mdi-twitter text-white"></i>
                                                            </span>
                                                </div>
                                                <h5 class="font-size-15">Twitter</h5>
                                                <p class="text-muted mb-0">112 sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="social-source text-center mt-3">
                                                <div class="avatar-xs mx-auto mb-3">
                                                    <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                                <i class="mdi mdi-instagram text-white"></i>
                                                            </span>
                                                </div>
                                                <h5 class="font-size-15">Instagram</h5>
                                                <p class="text-muted mb-0">104 sales</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <a href="#" class="text-primary font-size-14 fw-medium">View All Sources <i class="mdi mdi-chevron-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Transaction</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 20px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>Order ID</th>
                                                    <th>Billing Name</th>
                                                    <th>Date</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Method</th>
                                                    <th>View Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2540</a> </td>
                                                    <td>Neal Matthews</td>
                                                    <td>
                                                        07 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $400
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck3">
                                                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2541</a> </td>
                                                    <td>Jamal Burnett</td>
                                                    <td>
                                                        07 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $380
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-danger font-size-12">Chargeback</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck4">
                                                            <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2542</a> </td>
                                                    <td>Juan Mitchell</td>
                                                    <td>
                                                        06 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $384
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck5">
                                                            <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2543</a> </td>
                                                    <td>Barry Dick</td>
                                                    <td>
                                                        05 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $412
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck6">
                                                            <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2544</a> </td>
                                                    <td>Ronald Taylor</td>
                                                    <td>
                                                        04 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $404
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-warning font-size-12">Refund</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-visa me-1"></i> Visa
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" class="form-check-input" id="customCheck7">
                                                            <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#MB2545</a> </td>
                                                    <td>Jacob Hunter</td>
                                                    <td>
                                                        04 Oct, 2019
                                                    </td>
                                                    <td>
                                                        $392
                                                    </td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-soft-success font-size-12">Paid</span>
                                                    </td>
                                                    <td>
                                                        <i class="fab fa-cc-paypal me-1"></i> Paypal
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div>
                <!-- container-fluid -->




<?php include_once 'footer.php'; ?>



    
                 

                    
