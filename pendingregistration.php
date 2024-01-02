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
                                <h4 class="mb-0">Requests</h4>

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
                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                       
                                            <i class="uil-graph-bar" style="color: red; font-size: 30px;"></i>
                                        
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT COUNT(id) FROM usertable");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumrequests = $result['COUNT(id)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $sumrequests;?></span></h4>
                                        <p class="text-muted mb-0">Total Registered</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>2.65%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: orange; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT COUNT(id) FROM usertable WHERE regval='Deny'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumpending = $result['COUNT(id)'];                                                               
                                                ?>

                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $sumpending;?></span></h4>
                                        <p class="text-muted mb-0">Denied</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0.82%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->

                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end mt-2">
                                        <i class="uil-graph-bar" style="color: yellow; font-size: 30px;"></i>
                                    </div>
                                    <div>

                                    <?php
                                            include 'db.inc.php';
                                            $query = mysqli_query($conn,  "SELECT COUNT(id) FROM usertable WHERE regval='Accept'");
                                            while($result = mysqli_fetch_array($query)): ?>
                                                <?php                                                            
                                                    $sumendorsed = $result['COUNT(id)'];                                                               
                                                ?>
                                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $sumendorsed;?></span></h4>
                                        <p class="text-muted mb-0">Accepted</p>
                                    </div>
                                    <!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>6.24%</span> since last week
                                    </p>-->
                                </div>
                            </div>
                            <?php endwhile; ?> 
                        </div>
                        <!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">List of Registration</h4>
                                    <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Position/Title</th>                                                                                          
                                                <th>Role</th>              
                                                <th>Status</th>                                   
                                                <th>View</th>
                                                <th>Delete</th>
                                                                                  
                                              <!--  <th>Update</th>
                                                <th>Delete</th> -->
                                                
                                                                            
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                                include 'db.inc.php';
                                                $query1 = mysqli_query($conn,"SELECT * FROM usertable ORDER BY tms ASC");
                                                while($result1 = mysqli_fetch_array($query1)): ?>
                                            <tr>
                                                                                
                                              <?php 
                                               

                                                
                                              ?>
                                                <td><?php echo $result1 ['fname']; ?></td>
                                                <td><?php echo $result1 ['position']; ?></td>  
                                                <td><?php echo $result1 ['type']; ?></td>
                                                <td><?php echo $result1 ['regval']; ?></td>
                                                
                                           
                                                
                                                <td> <a href="pendingregistrationupdate.php?update=<?php echo $result1['id'];?>" class="btn  btn-raised btn-success waves-effect">View</a></td>                               
                                                <td> <a onClick="deleteme('deletefile=users/<?php echo $result1 ['pfile'];?>&&deletepds=pds/<?php echo $result1 ['pdoc'];?>&&delete=<?php echo $result1['id'];?>')" class="btn  btn-raised btn-danger waves-effect">Delete</a></td> 

                                                <script>
                                                    function deleteme(delid){
                                                        if(confirm("Are you sure you want to delete this data?")){
                                                        window.location.href='pendingregistrationfunction.php?' +delid+ '';
                                                        return true;
                                                        }
                                                        }
                                                </script>
                                            
                                            
                                                                                        
                                            </tr>
                                                <?php endwhile; ?>

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



    
                 

                    
