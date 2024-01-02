<?php include_once 'heading.php';?>



<?php  

$date_f = date('Y-m-d');

$date_t = date('H:i:s');
$date_m = date('m');
$date_d = date('d');
$date_y = date('Y');

?>

<?php
$date_f = date('Y-m-d');
$date_t = date('H:i:s');
$date_m = date('m');
$date_d = date('d');
$date_y = date('Y');

function createRandomPassword() {
    $chars = "001312132303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode='CM'.date('Y').''.date('d').''.createRandomPassword().''.date('m');
?>
   <!-- start page title -->
    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Commodity Registration</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Entry</a></li>
                                        <li class="breadcrumb-item active">Commodity</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                  

                    <div class="row">
                 
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Add Commodity Details</h4>
                                    
                         

                                    <h4 style="color: royalblue; font-size:15px; margin-top: 20px;">Commodity Details</h4>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="code">Code</label>
                                                        <input type="text" required readonly class="form-control" id="code" value='<?php echo $finalcode;?>'>      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3" style="display:none;">
                                                    <div class="commo">
                                                        <label for="code">Unit</label>
                                                        <input type="text" required readonly class="form-control" id="comm_unit" value='kilogram'>      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm">Commodity</label>
                                                        <input type="text" required class="form-control" id="comm" placeholder="Please Enter Commodity Name *">      
                                                    </div>                                        
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="comm_type">Type</label>                                                       
                                                            <select id="comm_type" class="form-select">
                                                            <option value="">Please Select Type *</option>
                                                            <option value="Vegetable">Vegetable</option>
                                                            <option value="Spice">Spice</option>
                                                            <option value="Root Crop">Root Crop</option>
                                                            <option value="Fruit">Fruit</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_prod">Production Cost (Php/kg)</label>
                                                        <input type="text" required class="form-control comm_prod" id="comm_prod" oninput="calculateValues()" placeholder="Please Enter Cost (Php/kg) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_fgpm">Farmgate Price Mark-up (%)</label>
                                                        <input type="text" required class="form-control comm_fgpm" id="comm_fgpm" oninput="calculateValues()" placeholder="Please Enter Mark-up (%) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_fgp">Farmgate Price</label>
                                                        <input type="text" required class="form-control comm_fgp" id="comm_fgp" oninput="calculateValues()" readonly placeholder="Result (Php/kg) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_wspm">Wholesale Price Mark-up (%)</label>
                                                        <input type="text" required class="form-control comm_wspm" id="comm_wspm" oninput="calculateValues()" placeholder="Please Enter Mark-up (%) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_wsppc">Processing Cost (Php/kg)</label>
                                                        <input type="text" required class="form-control comm_wsppc" id="comm_wsppc" oninput="calculateValues()" placeholder="Please Enter Cost (Php/kg) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_wsp">AgriHub Wholesale Price (Php/kg)</label>
                                                        <input type="text" required class="form-control comm_wsp" id="comm_wsp" oninput="calculateValues()" readonly placeholder="Result (Php/kg) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_srpm">Social Retail Price Mark-up (%)</label>
                                                        <input type="text" required class="form-control comm_srpm" id="comm_srpm" oninput="calculateValues()" placeholder="Please Enter Mark-up (%) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="comm_srp">Social Retail Price (Php/kg)</label>
                                                        <input type="text" required class="form-control comm_srp" id="comm_srp" oninput="calculateValues()" readonly placeholder="Result (Php/kg) *">      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3" style='display:none;'>
                                                    <div class="commo">
                                                        <label for="comm_diffp">Dynamic SRP vs Prevailing Market Price (%)</label>
                                                        <input type="text" required class="form-control comm_diffp" id="comm_diffp" oninput="calculateValues()" value='10' readonly placeholder="Result (Php/kg) *">      
                                                    </div>                                        
                                                </div>
                                                
                                                <script>
                                                    function calculateValues() {
                                                    // Get input values
                                                    var comm_prod = parseFloat(document.querySelector('.comm_prod').value);
                                                    var comm_fgpm = parseFloat(document.querySelector('.comm_fgpm').value);
                                                    var comm_fgp = parseFloat(document.querySelector('.comm_fgp').value);
                                                    var comm_wspm = parseFloat(document.querySelector('.comm_wspm').value);
                                                    var comm_wsppc = parseFloat(document.querySelector('.comm_wsppc').value);
                                                    var comm_wsp = parseFloat(document.querySelector('.comm_wsp').value);
                                                    var comm_srpm = parseFloat(document.querySelector('.comm_srpm').value);
                                                    var comm_srp = parseFloat(document.querySelector('.comm_srp').value);                                         
                                                    var resultcomm_fgp = comm_prod * (1+(comm_fgpm / 100));
                                                    var resultcomm_wsp = (comm_fgp + comm_wsppc) * (1+(comm_wspm / 100));
                                                    var resultcomm_srp = resultcomm_wsp * (1+(comm_srpm / 100));
                                                 
                                                    // Update input values
                                                    document.querySelector('.comm_fgp').value = resultcomm_fgp.toFixed(2);
                                                    document.querySelector('.comm_wsp').value = resultcomm_wsp.toFixed(2);
                                                    document.querySelector('.comm_srp').value = resultcomm_srp.toFixed(2);                                                        
                                                                                    
                                                }
                                                </script>
                                                    <button type="button" class="btn btn-primary submit-btn" id="submit-btn">Save</button>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card-->
                            </div>

                    <script>
                        $(document).ready(function() {
                        $("#submit-btn").click(function(e) {
                            e.preventDefault();
                            var code= $('#code').val();
                            var comm= $('#comm').val();
                            var comm_type= $('#comm_type').val();
                            var comm_prod= $('#comm_prod').val();
                            var comm_fgpm= $('#comm_fgpm').val();
                            var comm_fgp= $('#comm_fgp').val();
                            var comm_wspm= $('#comm_wspm').val();
                            var comm_wsppc= $('#comm_wsppc').val();
                            var comm_wsp= $('#comm_wsp').val();
                            var comm_srpm= $('#comm_srpm').val();
                            var comm_unit= $('#comm_unit').val();
                            var comm_srp= $('#comm_srp').val();
                            var comm_diffp= $('#comm_diffp').val();

                            // Send the dataArray to the PHP script
                            $.ajax({
                                    url:"commodityprocess.php",
                                    method:"POST",
                                    data:{code:code,comm:comm,comm_type:comm_type,comm_prod:comm_prod,comm_fgpm:comm_fgpm,comm_fgp:comm_fgp,comm_wspm:comm_wspm,comm_wsppc:comm_wsppc,comm_wsp:comm_wsp,comm_srpm:comm_srpm,comm_unit:comm_unit,comm_srp:comm_srp,comm_diffp:comm_diffp},
                                    success:function(data,status){
                                                                        
                                        
                                        Swal.fire({
                                            title: 'Success',
                                            text: 'Saved successfully!',
                                            icon: 'success',
                                            timer: 2000
                                            }).then(() => {
                                            location.reload();
                                            }); 
                                            
                                    }
                                    });
                        });
                        });                                                    
                    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                     
                
                        <!-- end col-->

                   
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                

                                <h4 class="card-title">Commodities</h4>

                                    <div class='open_data'>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                            <tr>
                                        
                                                <th>Commodity</th>
                                                <th>Type</th>
                                                <th>Class</th>
                                                <th>Farmgate</th>
                                                <th>Wholesale</th>
                                                <th>Delete</th>
                                                
                                                                            
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                                include 'db.inc.php';
                                                $query1 = mysqli_query($conn,"SELECT * FROM comm_posnew ORDER BY comm ASC");
                                                while($result1 = mysqli_fetch_array($query1)): ?>
                                            <tr>
                                                                                
                                              
                                                <td><?php echo $result1 ['comm']; ?></td>
                                                <td><?php echo $result1 ['comm_type']; ?></td>
                                                <td>Class A</td>
                                                <td><?php echo $result1 ['comm_fgp']; ?></td>
                                                <td><?php echo $result1 ['comm_wsp']; ?></td>
                                                <td> <a onClick="deleteme(<?php echo $result1['id'];?>)" class="btn  btn-raised btn-danger waves-effect">Delete</a></td>

                                                <script>
                                                    function deleteme(delid){
                                                        if(confirm("Are you sure you want to delete this data?")){
                                                        window.location.href='commodityprocess.php?delete=' +delid+ '';
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
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>
                        <!-- end col-->
                        </div>


<?php include_once 'footer.php';?>