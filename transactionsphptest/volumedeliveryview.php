<?php include 'heading.php'; ?>




<?php
if (isset($_GET['view'])) {
    include_once 'db.inc.php';
   
   $recno = $_GET['view'];
}

   ?>






<?php

$date_f = date('Y-m-d');
$date_t = date('H:i:s');
$date_m = date('m');
$date_d = date('d');
$date_y = date('Y');
?>




<div class="row" >
                        <div class="col-6 mx-auto">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0" >Receipt Detail</h4>
                                <a class='btn btn-primary' href="volumeview.php" style="margin-top: 20px;"> Exit </a> 
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Receipt</a></li>
                                        <li class="breadcrumb-item active">Receipt Detail</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    

                    <div class="row" id="printarea_01">
                        <div class="col-lg-6 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="invoice-title">
                                        <h4 class="float-end" style="font-size:12px; color: black">Receipt #<?php echo $recno; ?> <span class="badge bg-success font-size-12 ms-2" style="color: black;">Paid</span></h4>
                                        <div class="mb-4">
                                            <img src="Picture1.png" alt="logo" height="60" />
                                        </div>
                                        <div class="text-muted">
                                            <p class="mb-1" style="color:black; font-size:12px; font-weight:bold;">2nd Floor, Integrated Bus Terminal, Andaya Road, Barangay Fort, Butuan City</p>
                                           <!-- <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> abc@123.com</p> -->
                                            <p style="color:black; font-size:12px; font-weight:bold;"><i class="uil uil-phone me-1"></i> (085) 817-6971 / ocee.butuancity@gmail.com</p>
                                        </div>
                                    </div>

                               

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-muted">

                                                <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT * FROM drvolume WHERE (recno LIKE '%$recno%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                    <h5 style="font-size:12px; color:black; font-weight:bold;" >Billed To:</h5>
                                                    <h5 style="font-size:12px; color:black;" ><?php echo $result1['nname'];?></h5>         
                                                <?php endwhile; ?>      
                                                
                                                <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT SUM(vol_subtot) FROM com_vol_mon WHERE (code LIKE '%$recno%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                    <h5 style="font-size:12px; color:black; font-weight:bold;" >Total Volume Delivered:</h5>
                                                    <h5 style="font-size:12px; color:black;" ><?php echo $result1['SUM(vol_subtot)'];?> kg</h5>         
                                                <?php endwhile; ?>   
                                          
                                             
                                                <div>
                                                    <h5 style="font-size:12px; color:black; font-weight:bold;">Receipt Date and Time:</h5>

                                             

                                                    <p style="font-size:12px; color:black;"><?php echo $date_f;?>/<?php echo $date_t;?></p>

                                            </div>

                                       

                                        </div>
                                        
                                      
                                       
                                    </div>


                                    <div>
                                        <h5 style="font-size:12px; color:black;">Order summary</h5>

                                        <div class="table-responsive">
                                            <table class="table-centered table table-wrap mb-0" style="width:100%;">
                                             
                                                <tbody>

                                                <tr>
                                                     
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Commodity</th>             
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Unit</th>     
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Kg per Unit (Kg)</th>     
                                                        <th style="width: 100px; font-size:12px; font-weight: bold; color:black;">Rate per Unit (Php)</th>       
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Units Delivered</th>                            
                                                        <th  style="width: 50px;  font-size:12px; font-weight: bold; color:black;">Subtotal</th>
                                                </tr>

                                                    <?php
                                                        include 'db.inc.php';
                                                        $query2 = mysqli_query($conn,"SELECT * FROM com_vol_mon WHERE (code LIKE '%$recno%')");
                                                        while($result2 = mysqli_fetch_array($query2)): ?>

                                                    <tr>
                                                     
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['dcom'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['dunt'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo number_format($result2['deuw'], 2);?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo number_format($result2['drate'], 2);?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['dund'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;">P <?php echo number_format($result2['pay_subtotal'], 2);?></td>
                                                        
                                                    </tr>

                                                    <?php endwhile; ?>


                                                    <?php
                                                        include 'db.inc.php';
                                                        $query3 = mysqli_query($conn,"SELECT redtp, SUM(pay_subtotal) FROM com_vol_mon WHERE (code LIKE '%$recno%')");
                                                        while($result3 = mysqli_fetch_array($query3)): ?>
                                         
                                                            
                                             
                                                    <tr>
                                                        <td  colspan="5" style="font-size:15px; color:black; font-weight:bold; margin-bottom: 20px; text-align: right;">Total</td>
                                                        <td colspan="1" style="font-size:15px; color:black; margin-bottom: 20px; text-align: right;">
                                                            <h4 style="font-size:15px; color:black;">P <?php echo number_format($result3['SUM(pay_subtotal)'], 2);?></h4>
                                                        </td>
                                                        
                                                    </tr>



                                                    <tr>
                                                        <td colspan="6" style="text-align: center;"></td>                                                        
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align: center;"></td>                                                        
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" style="text-align: center;">Charito S. Quitoriano</td>
                                                        <td colspan="3" style="text-align: center;"><?php echo $result3['redtp'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="text-align: center; font-weight:bold;">MARKET INSPECTOR DESIGNATE</td>
                                                        <td colspan="3" style="text-align: center; font-weight:bold;">REVENUE COLLECTOR DESIGNATE</td>
                                                    </tr>

                                            

                                                    <?php endwhile; ?>

                                                



                                                </tbody>
                                            </table>
                                        </div>
                                   
                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                            <a onclick="printPage()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                              <!--  <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    

                  
<script>
    function printPage(){
        var printarea_01 = document.getElementById('printarea_01').innerHTML;
     
        window.print();
    }
</script>






<?php include 'footer.php'; ?>