<?php


include 'db.inc.php';

if(isset($_POST['datefrom']) && isset($_POST['dateto'])){ ?>


<?php 

$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];


?>

<?php
$date_f = date('Y-m-d');
?>

<?php $yearnow=date('Y'); ?>

<div class="row">

<div class="col-md-12 col-xl-12">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Deliveries   
         

        <table id="table_collect2" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
             <thead>
                 <tr>
                     
                        <th>Transaction Date</th>  
                        <th>Dr No.</th>                                                 
                        <th>Name</th>                                                   
                        <th>Status</th>  
                        <th>Hide</th>
                        <th>Amount</th> 
                        <th>Action</th>                                                  
                        <!--<th>Delete</th>  -->  
                  
                 </tr>
             </thead>


             <tbody>
                 <?php
                     include 'db.inc.php';
                     $query001 = mysqli_query($conn,"SELECT trans_code, trans_partner, trans_partnercode, trans_partnertype, trans_adate, trans_status, ftrans_encoder, SUM(pay_subtotal_final) FROM erp_record WHERE trans_partnertype='Vendor' AND (trans_adate BETWEEN '$datefrom' AND '$dateto') GROUP BY trans_code");
                     while($result001 = mysqli_fetch_array($query001)): ?>
                 <tr>
                 <?php 
                                                 $status_final=$result001 ['trans_status'];
                                                 ?>
                         
                        <td><?php echo $result001 ['trans_adate']; ?></td>    
                        <td><a href="receiptsalesviewtransaction.php?view=<?php echo $result001 ['trans_code'];?>"><?php echo $result001 ['trans_code']; ?></a></td>   
                        <td><?php echo $result001 ['trans_partner']; ?></td> 
                        <td><?php echo $result001 ['trans_status']; ?></td> 
                        <td style='display:none;'><input type="text" id='codehidden' readonly value='<?php echo $result001 ['trans_code'];?>'></td>
                        <td><?php echo $result001 ['SUM(pay_subtotal_final)']; ?></td> 
                       <td> <button onClick="updateme('update=<?php echo $result001 ['trans_code'];?>&&paydate=<?php echo $date_f;?>')" <?php if ($status_final == "Paid") { echo 'disabled'; } ?> class="btn  btn-raised btn-warning waves-effect">Paid</button></td>

                        <script>
                            function updateme(delid){
                                if(confirm("Are you sure you want to update this data to Paid?")){
                                window.location.href='receiptsalesupdate.php?' +delid+ '';
                                
                                }
                                }
                        </script> 
                      
                                 
                 </tr>
                     <?php endwhile; ?>

             </tbody>
         </table>

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




<?php } ?>