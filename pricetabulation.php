<?php include_once 'heading.php';?>
<?php $yearnow=date('Y'); ?>
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



<!--################################################################################################################### FOR ADMIN VIEW (START) #####################################################################################-->



    <?php
$date_f = date('Y-m-d');
?>


                        <!-- Start Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Partial Payment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                 



                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick=addproduct()>Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>

            <!-- End Modal -->


    <div id="dashboardmain">
                    
                    <div class="row">

                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Commodity Pricing   <div style='width: 50%;'><input type="date" id='changeDate' class='form-control' onchange="changeDate()"></div> <br>
                                 
                            <div class='table-responsive'>
                                <table id="table_collect2" class="table table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody>
                                        <tr>
                                            <td rowspan="2" style="text-align: center; vertical-align: middle; background-color: #FFADAD;">Commodity</td>
                                            <td colspan="2" style="text-align: center; vertical-align: middle; background-color: #E4F1EE;">Production Cost</td>                                        
                                            <td colspan="3" style="text-align: center; vertical-align: middle; background-color: #3DED97;">Farmgate Price</td>        
                                            <td colspan="4" style="text-align: center; vertical-align: middle; background-color: #FFDF00;">AgriHub</td>       
                                            <td colspan="2" style="text-align: center; vertical-align: middle; background-color: #63C5DA;">Social Retail Price</td>  
                                            <td colspan="2" style="text-align: center; vertical-align: middle; background-color: #DEDAF4;">Prevailing Market Price</td>                                   
                                        </tr>
                                 

                                              
                                     <style>
                                        .green-bg {
                                            background-color: green;
                                        }

                                        .red-bg {
                                            background-color: red;
                                        }
                                    </style>
                                

                                    <tr>
                                       
                                        <td style="text-align: center; vertical-align: middle; background-color: #E4F1EE;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #E4F1EE;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #3DED97;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #3DED97;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #3DED97;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #FFDF00;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #FFDF00;">Processing Cost (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #FFDF00;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #FFDF00;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #63C5DA;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #63C5DA;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #DEDAF4;">Diff Dynamic SRP vs Prevailing Market Price (%)</td>
                                        <td style="text-align: center; vertical-align: middle; background-color: #DEDAF4;">Prevailing (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle; display: none;">Date</td>
                                    </tr>
                                    
                                    <?php
                                             include 'db.inc.php';
                                             $query001 = mysqli_query($conn,"SELECT * FROM comm_posnew ORDER BY comm ASC");
                                             while($result001 = mysqli_fetch_array($query001)): ?>
                                            <tr>                                             
                                                <td style='background-color: #FFADAD;'><?php echo $result001 ['comm'];?><input style='display:none;' type="text" class='comm_f' value='<?php echo $result001 ['comm'];?>' id='comm'></td>                                             
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #E4F1EE;'><input style='display:none;' id='k_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_prod'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_prod'><?php echo $result001 ['comm_prod'];?></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #E4F1EE;'><input style='display:none;' id='a_<?php echo $result001['id']; ?>' type="text" value='' readonly> <input style='display:none;' id='m_<?php echo $result001['id']; ?>' type="text" value='' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_prod_f'> <div id='am_<?php echo $result001['id']; ?>'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #3DED97;' ><input style='display:none;' id='b_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_fgpm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='n_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_fgpm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_fgpm_f'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #3DED97;'><input style='display:none;' id='u_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_fgp'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_fgp'><?php echo $result001 ['comm_fgp'];?></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #3DED97;'><input style='display:none;' id='c_<?php echo $result001['id']; ?>' type="text" value='' readonly><input style='display:none;' id='o_<?php echo $result001['id']; ?>' type="text" value='' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_fgp_f'><div id='co_<?php echo $result001['id']; ?>'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #FFDF00;'><input style='display:none;' id='d_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_wspm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='p_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_wspm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_wspm_f'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #FFDF00;'><input style='display:none;' id='e_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_wsppc'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='q_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_wsppc'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_wsppc_f'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #FFDF00;'><input style='display:none;' id='l_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_wsp'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_wsp'><?php echo $result001 ['comm_wsp'];?></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #FFDF00;'><input style='display:none;' id='f_<?php echo $result001['id']; ?>' type="text" value='' readonly><input style='display:none;' id='r_<?php echo $result001['id']; ?>' type="text" value='' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_wsp_f'><div id='fr_<?php echo $result001['id']; ?>'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #63C5DA;'><input style='display:none;' id='g_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_srpm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='s_<?php echo $result001['id']; ?>' type="text" value='<?php echo $result001 ['comm_srpm'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_srpm_f'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #63C5DA;'><input style='display:none;' id='h_<?php echo $result001['id']; ?>' type="text" value='' readonly> <input style='display:none;' id='t_<?php echo $result001['id']; ?>' type="text" value='' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_srp_f'><div id='ht_<?php echo $result001['id']; ?>'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #DEDAF4;'><input id='i_<?php echo $result001['id']; ?>' style='text-align: center; align-items: center; justify-content: center; width:40%; display:none;' type="text" value='<?php echo $result001 ['comm_diffp'];?>' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_diffp_f'> <div><?php echo $result001 ['comm_diffp'];?></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center; background-color: #DEDAF4;'><input id='j_<?php echo $result001['id']; ?>' style='text-align: center; align-items: center; justify-content: center; width:40%;' type="text" value='' oninput="calculateValues(<?php echo $result001['id']; ?>)" class='comm_priv'></td>
                                                <td style='display:none;'><input type="date" id='comm_date' class='comm_date_f'></td>  
                                                <td style='display:none;'><input type="text" value='<?php echo $result001['comm_type']; ?>' class='comm_type_f'></td>  
                                                
                                          

                                                <script>
                                                    function changeDate() {
                                                        // Get the changed date value
                                                        var changedDate = document.getElementById('changeDate').value;

                                                        // Set the changed date value to the 'comm_date' input in each row
                                                        var rows = document.querySelectorAll('#table_collect2 tbody tr');
                                                        for (var i = 0; i < rows.length; i++) {
                                                            var commDateInput = rows[i].querySelector('[id^="comm_date"]');
                                                            if (commDateInput) {
                                                                commDateInput.value = changedDate;
                                                            }
                                                        }
                                                    }

                                                    function calculateValues(commId) {
                                                    // Get input values
                                                    var b = parseFloat(document.getElementById('b_' + commId).value);
                                                    var c = parseFloat(document.getElementById('c_' + commId).value);
                                                    var d = parseFloat(document.getElementById('d_' + commId).value);
                                                    var e = parseFloat(document.getElementById('e_' + commId).value);
                                                    var f = parseFloat(document.getElementById('f_' + commId).value);
                                                    var g = parseFloat(document.getElementById('g_' + commId).value);
                                                    var h = parseFloat(document.getElementById('h_' + commId).value);
                                                    var i = parseFloat(document.getElementById('i_' + commId).value);
                                                    var j = parseFloat(document.getElementById('j_' + commId).value);
                                                    var k = parseFloat(document.getElementById('k_' + commId).value);
                                                    var l = parseFloat(document.getElementById('l_' + commId).value);
                                                    var m = parseFloat(document.getElementById('m_' + commId).value);
                                                    var n = parseFloat(document.getElementById('n_' + commId).value);
                                                    var o = parseFloat(document.getElementById('o_' + commId).value);
                                                    var p = parseFloat(document.getElementById('p_' + commId).value);
                                                    var q = parseFloat(document.getElementById('q_' + commId).value);
                                                    var r = parseFloat(document.getElementById('r_' + commId).value);
                                                    var s = parseFloat(document.getElementById('s_' + commId).value);
                                                    var t = parseFloat(document.getElementById('t_' + commId).value);
                                                    var u = parseFloat(document.getElementById('u_' + commId).value);

                                                    var resultH = j / (1 + (i / 100));
                                                    var resultF = resultH / (1 + (g / 100));
                                                    var resultC = resultF / (1 + (d / 100)) - e;
                                                    var resultA = resultC / (1 + (b / 100));
                                                    var resultO = resultA * (1+(n / 100));
                                                    var resultR = (resultO + q) * (1+(p / 100));
                                                    var resultT = resultR * (1+(s / 100));

                                                    // Update input values
                                                    document.getElementById('c_' + commId).value = resultC.toFixed(2);
                                                    document.getElementById('f_' + commId).value = resultF.toFixed(2);
                                                    document.getElementById('h_' + commId).value = resultH.toFixed(2);
                                                    document.getElementById('a_' + commId).value = resultA.toFixed(2);
                                                    document.getElementById('m_' + commId).value = resultA.toFixed(2);
                                                    document.getElementById('am_' + commId).innerHTML = resultA.toFixed(2);
                                                    document.getElementById('co_' + commId).innerHTML = resultO.toFixed(2);
                                                    document.getElementById('fr_' + commId).innerHTML = resultR.toFixed(2);
                                                    document.getElementById('ht_' + commId).innerHTML = resultT.toFixed(2);
                                                    document.getElementById('o_' + commId).value = resultO.toFixed(2);
                                                    document.getElementById('r_' + commId).value = resultR.toFixed(2);
                                                    document.getElementById('t_' + commId).value = resultT.toFixed(2);

                                                    // Compare k and am values for background color change
                                                    var isKGreaterThanM = k > resultA;
                                                    var cElement = document.getElementById('am_' + commId);
                                                    cElement.style.color = isKGreaterThanM ? 'red' : 'green';

                                                    // Compare i and co values for background color change
                                                    var isUGreaterThanO = u > resultO;
                                                    var oElement = document.getElementById('co_' + commId);
                                                    oElement.style.color = isUGreaterThanO ? 'red' : 'green';

                                                    
                                                    // Compare i and co values for background color change
                                                    var isLGreaterThanR = l > resultR;
                                                    var LElement = document.getElementById('fr_' + commId);
                                                    LElement.style.color = isLGreaterThanR ? 'red' : 'green';

                                                     // Compare i and co values for background color change
                                                     var isHTGreaterThanJ = j < resultT;
                                                    var HTElement = document.getElementById('ht_' + commId);
                                                    HTElement.style.color = isHTGreaterThanJ ? 'red' : 'green';                                                    
                                                                                    
                                                }
                                                </script>
                                            </tr>
                                            <?php endwhile; ?>
                                            

                                         


                                     </tbody>
                                 </table>

                                 </div>


                                 <button type="button" class="btn btn-success submit-btn" id="submit-btn">Save</button>
                                 <script>
                                        $(document).ready(function () {
                                            $("#submit-btn").click(function (e) {
                                                e.preventDefault();

                                                // Create an array to store data for each row
                                                var dataArray = [];

                                                // Loop through each row in the table
                                                $('#table_collect2 tbody tr').each(function () {
                                                    var row = $(this);
                                                    var rowData = {
                                                        comm_f: row.find('.comm_f').val(),
                                                        comm_prod: row.find('.comm_prod').val(),
                                                        comm_prod_f: row.find('.comm_prod_f').val(),
                                                        comm_fgpm_f: row.find('.comm_fgpm_f').val(),
                                                        comm_fgp: row.find('.comm_fgp').val(),
                                                        comm_fgp_f: row.find('.comm_fgp_f').val(),
                                                        comm_wspm_f: row.find('.comm_wspm_f').val(),
                                                        comm_wsppc_f: row.find('.comm_wsppc_f').val(),
                                                        comm_wsp: row.find('.comm_wsp').val(),
                                                        comm_wsp_f: row.find('.comm_wsp_f').val(),
                                                        comm_srpm_f: row.find('.comm_srpm_f').val(),
                                                        comm_srp_f: row.find('.comm_srp_f').val(),
                                                        comm_diffp_f: row.find('.comm_diffp_f').val(),
                                                        comm_priv: row.find('.comm_priv').val(),
                                                        comm_date_f: row.find('.comm_date_f').val(),
                                                        comm_type_f: row.find('.comm_type_f').val(),
                                                    };

                                                    // Push the rowData to the dataArray
                                                    dataArray.push(rowData);
                                                });

                                                // Send the dataArray to the PHP script
                                                $.ajax({
                                                    url: "pricetabulationprocess.php",
                                                    method: "POST",
                                                    data: { dataArray: dataArray },
                                                    success: function (data) {
                                                        var response = JSON.parse(data);

                                                        if (response.status === 'success') {
                                                            Swal.fire({
                                                                title: 'Success',
                                                                text: response.message,
                                                                icon: 'success',
                                                                timer: 2000
                                                            }).then(() => {
                                                                location.reload();
                                                            });
                                                        } else {
                                                            Swal.fire({
                                                                title: 'Error',
                                                                text: response.message,
                                                                icon: 'error'
                                                            });
                                                        }
                                                    },
                                                    error: function () {
                                                        Swal.fire({
                                                            title: 'Error',
                                                            text: 'An error occurred during the request.',
                                                            icon: 'error'
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    </script>


                                 <script>         
                                $(document).ready(function(){
                                $('.productinfo').click(function(){
                                    var commodityid = $(this).data('id');
                                   
                                    $.ajax({
                                                url:"transactionorderview.php",
                                                method:"POST",
                                                data:{commodityid:commodityid},
                                                success:function(data){
                                                    $('.modal-body').html(data);
                                                    $('#exampleModal').modal('show');
                                                    displayData();
                                                }
                                            });

                                            })
                                        })
                                    </script>




                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>


                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </div>

<!--################################################################################################################### FOR ADMIN VIEW (END) ######################################################################################-->

<!--################################################################################################################### FOR EMPLOYEE VIEW (START) ######################################################################################-->
<?php if($usertype=="Employee"){?>

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
                                        $query = mysqli_query($conn,  "SELECT SUM(pay_subtotal) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND redtp='$userprofile'");
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
                                        $query = mysqli_query($conn,  "SELECT SUM(vol_subtot) FROM com_vol_mon WHERE (cyear LIKE '%$yearnow%') AND redtp='$userprofile'");
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Commodity Pricing   
                             

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            
                                                <th>Commodity</th>                                         
                                                <th>FGP (Static)</th>  
                                                <th>WSP (Static)</th>                                            
                                                <th>Collector</th>     
                                                <th>Supplier</th>                                          
                                                <th>Address</th>                                              
                                                <th>Delete</th>                    
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            include 'db.inc.php';
                                            $query1 = mysqli_query($conn,"SELECT * FROM drvolume WHERE redtp='$userprofile' GROUP BY recno ORDER BY ndtdr DESC");
                                            while($result1 = mysqli_fetch_array($query1)): ?>
                                        <tr>

                                                             
                                            <td><?php echo $result1 ['ndtdr']; ?></td>                                                 
                                            <td><?php echo $result1 ['ntmar']; ?></td>
                                            <td><a href="receiptviewtransaction.php?view=<?php echo $result1 ['recno'];?>"><?php echo $result1 ['recno']; ?></a></td>                                    
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


<?php include_once 'footer.php';?>