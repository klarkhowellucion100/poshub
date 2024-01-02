<?php


include 'db.inc.php';

if(isset($_POST['datefrom']) && isset($_POST['dateto']) && isset($_POST['commoditydate'])){ ?>


<?php 

$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];
$commoditydate = $_POST['commoditydate'];


?>

<?php $yearnow=date('Y'); ?>


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
                                            $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND (ndtdr BETWEEN '$datefrom' AND '$dateto') AND (redtp LIKE '%$commoditydate%')");
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
                                            $query = mysqli_query($conn,  "SELECT SUM(vol_subtot) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND (ndtdr BETWEEN '$datefrom' AND '$dateto') AND (redtp LIKE '%$commoditydate%')");
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

                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Deliveries   
                                 

                                <table id="table_collect" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                     <thead>
                                         <tr>
                                             
                                             <th>Collector</th>  
                                             <th>Collection</th> 
                                             <th>Volume</th>
                                          
                                         </tr>
                                     </thead>


                                     <tbody>
                                         <?php
                                             include 'db.inc.php';
                                             $query001 = mysqli_query($conn,"SELECT ndtdr, redtp, SUM(pay_subtotal), SUM(vol_subtot) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND (ndtdr BETWEEN '$datefrom' AND '$dateto') AND (redtp LIKE '%$commoditydate%') GROUP BY redtp");
                                             while($result001 = mysqli_fetch_array($query001)): ?>
                                         <tr>
                                                 
                                            <td><?php echo $result001 ['redtp']; ?></td>           
                                             <td style="text-align: right;"><?php echo number_format($result001 ['SUM(pay_subtotal)'], 2); ?></td>                                                        
                                             <td style="text-align: right;"><?php echo number_format($result001 ['SUM(vol_subtot)'], 2); ?></td>  
                                              
                                                         
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
                                                $query1 = mysqli_query($conn,"SELECT * FROM drvolume WHERE (myear LIKE '%$yearnow%') AND (ndtdr BETWEEN '$datefrom' AND '$dateto') AND (redtp LIKE '%$commoditydate%') GROUP BY recno ORDER BY ndtdr DESC");
                                                while($result1 = mysqli_fetch_array($query1)): ?>
                                            <tr>           
                                                <td><?php echo $result1 ['ndtdr']; ?></td>                                                 
                                                <td><?php echo $result1 ['ntmar']; ?></td>
                                                <td><a href="volumedeliveryview.php?view=<?php echo $result1 ['recno'];?>"><?php echo $result1 ['recno']; ?></a></td>                                    
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

