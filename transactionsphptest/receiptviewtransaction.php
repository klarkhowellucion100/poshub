<?php include 'heading.php'; ?>




<?php
if (isset($_GET['view'])) {
    include_once 'db.inc.php';
   
   $trans_code = $_GET['view'];
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
                                <a class='btn btn-primary' href="receiptview.php" style="margin-top: 20px;"> Exit </a> 
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
                                        <h4 class="float-end" style="font-size:12px; color: black">Receipt #<?php echo $trans_code; ?> <!--<span class="badge bg-success font-size-12 ms-2" style="color: black;">Paid</span>--></h4>
                                        <div class="mb-4">
                                            <img src="hublogo.png" alt="logo" height="60" />
                                        </div>
                                        <div class="text-muted">
                                            <p class="mb-1" style="color:black; font-size:12px; font-weight:bold;">Van Terminal, Barangay Fort Poyohon, Butuan City</p>
                                           <!-- <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> abc@123.com</p> -->
                                            <p style="color:black; font-size:12px; font-weight:bold;"><i class="uil uil-phone me-1"></i> 09283784365 / gkagrihub@gmail.com</p>
                                        </div>
                                    </div>

                               

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-muted">

                                                <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT * FROM transactionsdrhubpos WHERE (trans_code LIKE '%$trans_code%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                    <h5 style="font-size:12px; color:black; font-weight:bold;" >Billed To:</h5>
                                                    <h5 style="font-size:12px; color:black;" ><?php echo $result1['trans_partner'];?></h5>         
                                                <?php endwhile; ?>      
                                                
                                                <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT SUM(trans_volume) FROM transactionfinalhubpos WHERE (ftrans_code LIKE '%$trans_code%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                    <h5 style="font-size:12px; color:black; font-weight:bold;" >Total Volume Delivered:</h5>
                                                    <h5 style="font-size:12px; color:black;" ><?php echo $result1['SUM(trans_volume)'];?> kg</h5>         
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
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Class</th>     
                                                        <th style="width: 100px; font-size:12px; font-weight: bold; color:black;">Price</th>       
                                                        <th style="width: 100px;  font-size:12px; font-weight: bold; color:black;">Kg</th>                            
                                                        <th  style="width: 50px;  font-size:12px; font-weight: bold; color:black;">Subtotal</th>
                                                </tr>

                                                    <?php
                                                        include 'db.inc.php';
                                                        $query2 = mysqli_query($conn,"SELECT * FROM viewfinal_subtot WHERE (ftrans_code LIKE '%$trans_code%')");
                                                        while($result2 = mysqli_fetch_array($query2)): ?>

                                                    <tr>
                                                     
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['trans_comm'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;">Kilogram</td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['trans_class'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;">P<?php echo $result2['trans_price'];?></td>
                                                        <td style="width: 50px;  font-size:11px; color:black;"><?php echo $result2['trans_volume'];?>kg</td>
                                                        <td style="width: 50px;  font-size:11px; color:black;">P <?php echo number_format($result2['pay_subtotal_final'], 2);?></td>
                                                        
                                                    </tr>

                                                    <?php endwhile; ?>


                                                    <?php
                                                        include 'db.inc.php';
                                                        $query3 = mysqli_query($conn,"SELECT SUM(pay_subtotal_final) FROM viewfinal_subtot WHERE (ftrans_code LIKE '%$trans_code%')");
                                                        while($result3 = mysqli_fetch_array($query3)): ?>
                                         
                                                    <tr>
                                                        <td  colspan="5" style="font-size:15px; color:black; font-weight:bold; margin-bottom: 20px; text-align: right;">Total</td>
                                                        <td colspan="1" style="font-size:15px; color:black; margin-bottom: 20px; text-align: right;">
                                                            <h4 style="font-size:15px; color:black;">P <?php echo number_format($result3['SUM(pay_subtotal_final)'], 2);?></h4>
                                                        </td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" style="text-align: center;"></td>                                                        
                                                    </tr>
                                                   

                                                    <tr style="font-size: 11px;">
                                                        <td colspan="2" style="text-align: left;">Prepared by:</td>
                                                        <td colspan="2" style="text-align: left;">Approved by:</td>
                                                        <td colspan="2" style="text-align: left;">Received by:</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" style="text-align: center;"></td>                                                        
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" style="text-align: center;"></td>                                                        
                                                    </tr>

                                                 

                                                    <tr style="margin-top: 100px;">
                                                        <td colspan="2" style="text-align: left;">Marites Reblinca</td>
                                                        <td colspan="2" style="text-align: left;">Victor Emmanuel Ozarraga</td>
                                                        <?php
                                                        include 'db.inc.php';
                                                        $query1 = mysqli_query($conn,"SELECT * FROM transactionsdrhubpos WHERE (trans_code LIKE '%$trans_code%')");
                                                        while($result1 = mysqli_fetch_array($query1)): ?>
                                                        <td colspan="2" style="text-align: left;"><?php echo $result1['trans_partner'];?></td>
                                                        <?php endwhile; ?>    
                                                    </tr>

                                               
                                                    <tr>
                                                        <td colspan="2" style="text-align: left; font-weight:bold;">Cashier</td>
                                                        <td colspan="2" style="text-align: left; font-weight:bold;">Operations Manager</td>
                                                        <td colspan="2" style="text-align: left; font-weight:bold;">AgriBOOST Partner</td>
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