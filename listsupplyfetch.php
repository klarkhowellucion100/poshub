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
                     
                <th>Market Channel</th>
                <th>Commodity</th>
                <th>Order</th>      
                  
                 </tr>
             </thead>


             <tbody>
                 <?php
                     include 'db.inc.php';
                     $query001 = mysqli_query($conn,"SELECT trans_partner, trans_comm, trans_commitvol, trans_volume, trans_volume-trans_commitvol AS diff  FROM erp_record WHERE trans_partnertype='Farmer' AND (trans_adate BETWEEN '$datefrom' AND '$dateto')");
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