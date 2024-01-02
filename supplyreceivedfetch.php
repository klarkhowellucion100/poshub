<?php


include 'db.inc.php';

if(isset($_POST['datefrom']) && isset($_POST['dateto'])){ ?>


<?php 

$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];


?>

<?php $yearnow=date('Y'); ?>
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
                     $query001 = mysqli_query($conn,"SELECT trans_code, trans_partner, trans_partnercode, trans_partnertype, trans_adate, trans_status, ftrans_encoder, SUM(pay_subtotal_final) FROM erp_record WHERE trans_partnertype='Farmer' AND (trans_adate BETWEEN '$datefrom' AND '$dateto') GROUP BY trans_code");
                     while($result001 = mysqli_fetch_array($query001)): ?>
                 <tr>
                         
                        
                        <td><?php echo $result001 ['trans_partner']; ?></td> 
                        <td><a href="supplyreceivedview.php?view=<?php echo $result001 ['trans_code'];?>&&partner=<?php echo $result001 ['trans_partner'];?>"><?php echo $result001 ['trans_code']; ?></a></td>  
                        <td><?php echo $result001 ['trans_adate']; ?></td>  
                        <td><?php echo $result001 ['SUM(pay_subtotal_final)']; ?></td> 
                        <td> <a onClick="deleteme('delete=<?php echo $result001 ['trans_code'];?>')" class="btn  btn-raised btn-danger waves-effect">Delete</a></td> 

                        <script>
                            function deleteme(delid){
                                if(confirm("Are you sure you want to delete this data?")){
                                window.location.href='supplyreceivedeletetable.php?' +delid+ '';
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



<?php } ?>