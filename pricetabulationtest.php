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

    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Search</h4>
                                    <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="datefrom">Delivery Date (From)</label>
                                                                <input type="date" class="form-control" id="datefrom">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="dateto">Delivery Date (To)</label>
                                                                <input type="date" class="form-control" id="dateto">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                  

                                                    <div class="col-xl-4">
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
                                                                    url:"listsupplyfetch.php",
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

                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Commodity Pricing   
                                 
                            <div class='table-responsive'>
                                <table id="table_collect2" class="table table-bordered border-primary dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody>
                                        <tr>
                                            <td rowspan="2" style="text-align: center; vertical-align: middle;">Commodity</td>
                                            <td colspan="2" style="text-align: center; vertical-align: middle;">Production Cost</td>                                        
                                            <td colspan="3" style="text-align: center; vertical-align: middle;">Farmgate Price</td>        
                                            <td colspan="4" style="text-align: center; vertical-align: middle;">AgriHub</td>       
                                            <td colspan="2" style="text-align: center; vertical-align: middle;">Social Retail Price</td>  
                                            <td colspan="2" style="text-align: center; vertical-align: middle;">Prevailing Market Price</td>                                   
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
                                       
                                        <td style="text-align: center; vertical-align: middle;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle;">Processing Cost (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Static (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Mark-up (%)</td>
                                        <td style="text-align: center; vertical-align: middle;">Dynamic (Php/kg)</td>
                                        <td style="text-align: center; vertical-align: middle;">Diff Dynamic SRP vs Prevailing Market Price (%)</td>
                                        <td style="text-align: center; vertical-align: middle;">Prevailing (Php/kg)</td>
                                    </tr>
                                    
                                            <tr>                                             
                                                <td>Baguio Beans</td>                                             
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='k' type="text" value='19.16' oninput="calculateValues()">19.16</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='a' type="text" value='' readonly> <input style='display:none;' id='m' type="text" value='' oninput="calculateValues()"> <div id='am'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='b' type="text" value='35' oninput="calculateValues()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='n' type="text" value='35' oninput="calculateValues()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='u' type="text" value='25.87' oninput="calculateValues()">25.87</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='c' type="text" value='' readonly><input style='display:none;' id='o' type="text" value='' oninput="calculateValues()"><div id='co'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='d' type="text" value='10' oninput="calculateValues()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='p' type="text" value='10' oninput="calculateValues()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='e' type="text" value='2.75' oninput="calculateValues()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='q' type="text" value='2.75' oninput="calculateValues()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='l' type="text" value='32.69' oninput="calculateValues()">32.69</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='f' type="text" value='' readonly><input style='display:none;' id='r' type="text" value='' oninput="calculateValues()"><div id='fr'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='g' type="text" value='20' oninput="calculateValues()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='s' type="text" value='20' oninput="calculateValues()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='h' type="text" value='' readonly> <input style='display:none;' id='t' type="text" value='' oninput="calculateValues()"><div id='ht'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='i' style='text-align: center; align-items: center; justify-content: center; width:40%; display:none;' type="text" value='10' oninput="calculateValues()"> <div>10</div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='j' style='text-align: center; align-items: center; justify-content: center; width:40%;' type="text" value='' oninput="calculateValues()"></td>
                                                <script>
                                                    function calculateValues() {
                                                    // Get input values
                                                    var b = parseFloat(document.getElementById('b').value);
                                                    var c = parseFloat(document.getElementById('c').value);
                                                    var d = parseFloat(document.getElementById('d').value);
                                                    var e = parseFloat(document.getElementById('e').value);
                                                    var f = parseFloat(document.getElementById('f').value);
                                                    var g = parseFloat(document.getElementById('g').value);
                                                    var h = parseFloat(document.getElementById('h').value);
                                                    var i = parseFloat(document.getElementById('i').value);
                                                    var j = parseFloat(document.getElementById('j').value);
                                                    var k = parseFloat(document.getElementById('k').value);
                                                    var l = parseFloat(document.getElementById('l').value);
                                                    var m = parseFloat(document.getElementById('m').value);
                                                    var n = parseFloat(document.getElementById('n').value);
                                                    var o = parseFloat(document.getElementById('o').value);
                                                    var p = parseFloat(document.getElementById('p').value);
                                                    var q = parseFloat(document.getElementById('q').value);
                                                    var r = parseFloat(document.getElementById('r').value);
                                                    var s = parseFloat(document.getElementById('s').value);
                                                    var t = parseFloat(document.getElementById('t').value);
                                                    var u = parseFloat(document.getElementById('u').value);

                                                    var resultH = j / (1 + (i / 100));
                                                    var resultF = resultH / (1 + (g / 100));
                                                    var resultC = resultF / (1 + (d / 100)) - e;
                                                    var resultA = resultC / (1 + (b / 100));
                                                    var resultO = resultA * (1+(n / 100));
                                                    var resultR = (resultO + q) * (1+(p / 100));
                                                    var resultT = resultR * (1+(s / 100));

                                                    // Update input values
                                                    document.getElementById('c').value = resultC.toFixed(2);
                                                    document.getElementById('f').value = resultF.toFixed(2);
                                                    document.getElementById('h').value = resultH.toFixed(2);
                                                    document.getElementById('a').value = resultA.toFixed(2);
                                                    document.getElementById('m').value = resultA.toFixed(2);
                                                    document.getElementById('am').innerHTML = resultA.toFixed(2);
                                                    document.getElementById('co').innerHTML = resultO.toFixed(2);
                                                    document.getElementById('fr').innerHTML = resultR.toFixed(2);
                                                    document.getElementById('ht').innerHTML = resultT.toFixed(2);
                                                    document.getElementById('o').value = resultO.toFixed(2);
                                                    document.getElementById('r').value = resultR.toFixed(2);
                                                    document.getElementById('t').value = resultT.toFixed(2);

                                                    // Compare k and am values for background color change
                                                    var isKGreaterThanM = k > resultA;
                                                    var cElement = document.getElementById('am');
                                                    cElement.style.color = isKGreaterThanM ? 'red' : 'green';

                                                    // Compare i and co values for background color change
                                                    var isUGreaterThanO = u > resultO;
                                                    var oElement = document.getElementById('co');
                                                    oElement.style.color = isUGreaterThanO ? 'red' : 'green';

                                                    
                                                    // Compare i and co values for background color change
                                                    var isLGreaterThanR = l > resultR;
                                                    var LElement = document.getElementById('fr');
                                                    LElement.style.color = isLGreaterThanR ? 'red' : 'green';

                                                     // Compare i and co values for background color change
                                                     var isHTGreaterThanJ = j < resultT;
                                                    var HTElement = document.getElementById('ht');
                                                    HTElement.style.color = isHTGreaterThanJ ? 'red' : 'green';                                                    
                                                                                    
                                                }
                                                </script>
                                            </tr>

                                            <tr>                                                
                                                <td>Banana Cardava</td>                                             
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='k1' type="text" value='8.17' oninput="calculateValues1()">8.17</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='a1' type="text" value='' readonly> <input style='display:none;' id='m1' type="text" value='' oninput="calculateValues1()"> <div id='am1'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='b1' type="text" value='35' oninput="calculateValues1()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='n1' type="text" value='35' oninput="calculateValues1()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='u1' type="text" value='11' oninput="calculateValues1()">11</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='c1' type="text" value='' readonly><input style='display:none;' id='o1' type="text" value='' oninput="calculateValues1()"><div id='co1'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='d1' type="text" value='10' oninput="calculateValues1()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='p1' type="text" value='10' oninput="calculateValues1()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='e1' type="text" value='2.75' oninput="calculateValues1()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='q1' type="text" value='2.75' oninput="calculateValues1()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='l1' type="text" value='13.50' oninput="calculateValues1()">13.50</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='f1' type="text" value='' readonly><input style='display:none;' id='r1' type="text" value='' oninput="calculateValues1()"><div id='fr1'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='g1' type="text" value='20' oninput="calculateValues1()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='s1' type="text" value='20' oninput="calculateValues1()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='h1' type="text" value='' readonly> <input style='display:none;' id='t1' type="text" value='' oninput="calculateValues1()"><div id='ht1'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='i1' style='text-align: center; align-items: center; justify-content: center; width:40%; display:none;' type="text" value='10' oninput="calculateValues1()"> <div>10</div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='j1' style='text-align: center; align-items: center; justify-content: center; width:40%;' type="text" value='' oninput="calculateValues1()"></td>
                                                <script>
                                                    function calculateValues1() {
                                                    // Get input values
                                                    var b1 = parseFloat(document.getElementById('b1').value);
                                                    var c1 = parseFloat(document.getElementById('c1').value);
                                                    var d1 = parseFloat(document.getElementById('d1').value);
                                                    var e1 = parseFloat(document.getElementById('e1').value);
                                                    var f1 = parseFloat(document.getElementById('f1').value);
                                                    var g1 = parseFloat(document.getElementById('g1').value);
                                                    var h1 = parseFloat(document.getElementById('h1').value);
                                                    var i1 = parseFloat(document.getElementById('i1').value);
                                                    var j1 = parseFloat(document.getElementById('j1').value);
                                                    var k1 = parseFloat(document.getElementById('k1').value);
                                                    var l1 = parseFloat(document.getElementById('l1').value);
                                                    var m1 = parseFloat(document.getElementById('m1').value);
                                                    var n1 = parseFloat(document.getElementById('n1').value);
                                                    var o1 = parseFloat(document.getElementById('o1').value);
                                                    var p1 = parseFloat(document.getElementById('p1').value);
                                                    var q1 = parseFloat(document.getElementById('q1').value);
                                                    var r1 = parseFloat(document.getElementById('r1').value);
                                                    var s1 = parseFloat(document.getElementById('s1').value);
                                                    var t1 = parseFloat(document.getElementById('t1').value);
                                                    var u1 = parseFloat(document.getElementById('u1').value);

                                                    var resultH1 = j1 / (1 + (i1 / 100));
                                                    var resultF1 = resultH1 / (1 + (g1 / 100));
                                                    var resultC1 = resultF1 / (1 + (d1 / 100)) - e1;
                                                    var resultA1 = resultC1 / (1 + (b1 / 100));
                                                    var resultO1 = resultA1 * (1+(n1 / 100));
                                                    var resultR1 = (resultO1 + q1) * (1+(p1 / 100));
                                                    var resultT1 = resultR1 * (1+(s1 / 100));

                                                    // Update input values
                                                    document.getElementById('c1').value = resultC1.toFixed(2);
                                                    document.getElementById('f1').value = resultF1.toFixed(2);
                                                    document.getElementById('h1').value = resultH1.toFixed(2);
                                                    document.getElementById('a1').value = resultA1.toFixed(2);
                                                    document.getElementById('m1').value = resultA1.toFixed(2);
                                                    document.getElementById('am1').innerHTML = resultA1.toFixed(2);
                                                    document.getElementById('co1').innerHTML = resultO1.toFixed(2);
                                                    document.getElementById('fr1').innerHTML = resultR1.toFixed(2);
                                                    document.getElementById('ht1').innerHTML = resultT1.toFixed(2);
                                                    document.getElementById('o1').value = resultO1.toFixed(2);
                                                    document.getElementById('r1').value = resultR1.toFixed(2);
                                                    document.getElementById('t1').value = resultT1.toFixed(2);

                                                    // Compare k and am values for background color change
                                                    var isKGreaterThanM1 = k1 > resultA1;
                                                    var cElement1 = document.getElementById('am1');
                                                    cElement1.style.color = isKGreaterThanM1 ? 'red' : 'green';

                                                    // Compare i and co values for background color change
                                                    var isUGreaterThanO1 = u1 > resultO1;
                                                    var oElement1 = document.getElementById('co1');
                                                    oElement1.style.color = isUGreaterThanO1 ? 'red' : 'green';
                                                    
                                                    // Compare i and co values for background color change
                                                    var isLGreaterThanR1 = l1 > resultR1;
                                                    var LElement1 = document.getElementById('fr1');
                                                    LElement1.style.color = isLGreaterThanR1 ? 'red' : 'green';

                                                     // Compare i and co values for background color change
                                                     var isHTGreaterThanJ1 = j1 < resultT1;
                                                    var HTElement1 = document.getElementById('ht1');
                                                    HTElement1.style.color = isHTGreaterThanJ1 ? 'red' : 'green';                                                    
                                                                                    
                                                }
                                                </script>
                                            </tr>

                                            <tr>
                                                <td><?php echo $commodityid ;?></td>                                             
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='k2' type="text" value='16.66' oninput="calculateValues2()">16.66</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='a2' type="text" value='' readonly> <input style='display:none;' id='m2' type="text" value='' oninput="calculateValues2()"> <div id='am2'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='b2' type="text" value='35' oninput="calculateValues2()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='n2' type="text" value='35' oninput="calculateValues2()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='u2' type="text" value='25' oninput="calculateValues2()">25</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='c2' type="text" value='' readonly><input style='display:none;' id='o2' type="text" value='' oninput="calculateValues2()"><div id='co2'></div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='d2' type="text" value='10' oninput="calculateValues2()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='p2' type="text" value='10' oninput="calculateValues2()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='e2' type="text" value='2.75' oninput="calculateValues2()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='q2' type="text" value='2.75' oninput="calculateValues2()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='l2' type="text" value='30' oninput="calculateValues2()">30</td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='f2' type="text" value='' readonly><input style='display:none;' id='r2' type="text" value='' oninput="calculateValues2()"><div id='fr2'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='g2' type="text" value='20' oninput="calculateValues2()"><input style='text-align: center; align-items: center; justify-content: center; width:40%;' id='s2' type="text" value='20' oninput="calculateValues2()"></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input style='display:none;' id='h2' type="text" value='' readonly> <input style='display:none;' id='t2' type="text" value='' oninput="calculateValues2()"><div id='ht2'></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='i2' style='text-align: center; align-items: center; justify-content: center; width:40%; display:none;' type="text" value='10' oninput="calculateValues2()"> <div>10</div></td>
                                                <td style='text-align: center; align-items: center; justify-content: center;'><input id='j2' style='text-align: center; align-items: center; justify-content: center; width:40%;' type="text" value='' oninput="calculateValues2()"></td>
                                                <script>
                                                    function calculateValues2() {
                                                    // Get input values
                                                    var b2 = parseFloat(document.getElementById('b2').value);
                                                    var c2 = parseFloat(document.getElementById('c2').value);
                                                    var d2 = parseFloat(document.getElementById('d2').value);
                                                    var e2 = parseFloat(document.getElementById('e2').value);
                                                    var f2 = parseFloat(document.getElementById('f2').value);
                                                    var g2 = parseFloat(document.getElementById('g2').value);
                                                    var h2 = parseFloat(document.getElementById('h2').value);
                                                    var i2 = parseFloat(document.getElementById('i2').value);
                                                    var j2 = parseFloat(document.getElementById('j2').value);
                                                    var k2 = parseFloat(document.getElementById('k2').value);
                                                    var l2 = parseFloat(document.getElementById('l2').value);
                                                    var m2 = parseFloat(document.getElementById('m2').value);
                                                    var n2 = parseFloat(document.getElementById('n2').value);
                                                    var o2 = parseFloat(document.getElementById('o2').value);
                                                    var p2 = parseFloat(document.getElementById('p2').value);
                                                    var q2 = parseFloat(document.getElementById('q2').value);
                                                    var r2 = parseFloat(document.getElementById('r2').value);
                                                    var s2 = parseFloat(document.getElementById('s2').value);
                                                    var t2 = parseFloat(document.getElementById('t2').value);
                                                    var u2 = parseFloat(document.getElementById('u2').value);

                                                    var resultH2 = j2 / (1 + (i2 / 100));
                                                    var resultF2 = resultH2 / (1 + (g2 / 100));
                                                    var resultC2 = resultF2 / (1 + (d2 / 100)) - e2;
                                                    var resultA2 = resultC2 / (1 + (b2 / 100));
                                                    var resultO2 = resultA2 * (1+(n2 / 100));
                                                    var resultR2 = (resultO2 + q2) * (1+(p2 / 100));
                                                    var resultT2 = resultR2 * (1+(s2 / 100));

                                                    // Update input values
                                                    document.getElementById('c2').value = resultC2.toFixed(2);
                                                    document.getElementById('f2').value = resultF2.toFixed(2);
                                                    document.getElementById('h2').value = resultH2.toFixed(2);
                                                    document.getElementById('a2').value = resultA2.toFixed(2);
                                                    document.getElementById('m2').value = resultA2.toFixed(2);
                                                    document.getElementById('am2').innerHTML = resultA2.toFixed(2);
                                                    document.getElementById('co2').innerHTML = resultO2.toFixed(2);
                                                    document.getElementById('fr2').innerHTML = resultR2.toFixed(2);
                                                    document.getElementById('ht2').innerHTML = resultT2.toFixed(2);
                                                    document.getElementById('o2').value = resultO2.toFixed(2);
                                                    document.getElementById('r2').value = resultR2.toFixed(2);
                                                    document.getElementById('t2').value = resultT2.toFixed(2);

                                                    // Compare k and am values for background color change
                                                    var isKGreaterThanM2 = k2 > resultA2;
                                                    var cElement2 = document.getElementById('am2');
                                                    cElement2.style.color = isKGreaterThanM2 ? 'red' : 'green';

                                                    // Compare i and co values for background color change
                                                    var isUGreaterThanO2 = u2 > resultO2;
                                                    var oElement2 = document.getElementById('co2');
                                                    oElement2.style.color = isUGreaterThanO2 ? 'red' : 'green';
                                                    
                                                    // Compare i and co values for background color change
                                                    var isLGreaterThanR2 = l2 > resultR2;
                                                    var LElement2 = document.getElementById('fr2');
                                                    LElement2.style.color = isLGreaterThanR2 ? 'red' : 'green';

                                                     // Compare i and co values for background color change
                                                     var isHTGreaterThanJ2 = j2 < resultT2;
                                                    var HTElement2 = document.getElementById('ht2');
                                                    HTElement2.style.color = isHTGreaterThanJ2 ? 'red' : 'green';                                                    
                                                                                    
                                                }
                                                </script>                                              
                                            </tr>

                                            <tr>
                                                <td>Banana Tundan</td>
                                                <td>11</td>
                                                <td>13.50</td>
                                            </tr>

                                            <tr>
                                                <td>Bitter Gourd (Ampalaya)</td>
                                                <td>38.33</td>
                                                <td>45.19</td>
                                            </tr>

                                            <tr>
                                                <td>Bottle Gourd (Upo)</td>
                                                <td>18.00</td>
                                                <td>22.83</td>
                                            </tr>

                                            <tr>
                                                <td>Chayote</td>
                                                <td>9.00</td>
                                                <td>12.54</td>
                                            </tr>

                                            <tr>
                                                <td>Cucumber (Pipino)</td>
                                                <td>20.98</td>
                                                <td>26.10</td>
                                            </tr>

                                            <tr>
                                                <td>Eggplant (Talong)</td>
                                                <td>30.24</td>
                                                <td>36.29</td>
                                            </tr>

                                            <tr>
                                                <td>Hot Pepper (Dynamite)</td>
                                                <td>55</td>
                                                <td>60</td>
                                            </tr>

                                            <tr>
                                                <td>Karlang</td>
                                                <td>12</td>
                                                <td>14</td>
                                            </tr>

                                            <tr>
                                                <td>Karlang (Red)</td>
                                                <td>10</td>
                                                <td>12</td>
                                            </tr>

                                            <tr>
                                                <td>Lady Finger (Okra)</td>
                                                <td>16.80</td>
                                                <td>21.51</td>
                                            </tr>

                                            <tr>
                                                <td>Lettuce</td>
                                                <td>81.23</td>
                                                <td>96.69</td>
                                            </tr>

                                            <tr>
                                                <td>Pechay</td>
                                                <td>31.48</td>
                                                <td>39.48</td>
                                            </tr>

                                            <tr>
                                                <td>Sponge Gourd (Patola)</td>
                                                <td>28.43</td>
                                                <td>34.30</td>
                                            </tr>

                                            <tr>
                                                <td>Pechay</td>
                                                <td>31.48</td>
                                                <td>37.76</td>
                                            </tr>

                                            <tr>
                                                <td>Pepper (Atsal) Sweet Conical</td>
                                                <td>85.88</td>
                                                <td>97.71</td>
                                            </tr>

                                            <tr>
                                                <td>Squash (Kalabasa)</td>
                                                <td>9.50</td>
                                                <td>12.55</td>
                                            </tr>

                                            <tr>
                                                <td>String Beans (Batong)</td>
                                                <td>21.31</td>
                                                <td>26.47</td>
                                            </tr>

                                            <tr>
                                                <td>Sweet Potato (Kamote)</td>
                                                <td>26.00</td>
                                                <td>32.67</td>
                                            </tr>

                                            <tr>
                                                <td>Tomato (Kamatis)</td>
                                                <td>35.14</td>
                                                <td>27.8</td>
                                            </tr>

                                            <tr>
                                                <td>Water Spinach (Kangkong)</td>
                                                <td>30.17</td>
                                                <td>36</td>
                                            </tr>

                                         



                                         <?php
                                             include 'db.inc.php';
                                             $query001 = mysqli_query($conn,"SELECT trans_partner, trans_comm, trans_commitvol, trans_volume, trans_volume-trans_commitvol AS diff  FROM erp_record WHERE trans_partnertype='Farmer' AND trans_adate='$date_f'");
                                             while($result001 = mysqli_fetch_array($query001)): ?>
                                         <tr>

                                        <td><?php echo $result001 ['trans_partner'];?></td>
                                        <td style="text-align: left;"><?php echo $result001 ['trans_comm'];?></td>  
                                        <td style="text-align: right;"><?php echo number_format($result001 ['trans_commitvol']);?> kg</td>   
                        
                                                         
                                         </tr>
                                             <?php endwhile; ?>

                                     </tbody>
                                 </table>
                                 </div>

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