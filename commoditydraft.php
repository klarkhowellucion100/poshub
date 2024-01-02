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
                                                        <input type="text" required readonly class="form-control" id="unit" value='kilogram'>      
                                                    </div>                                        
                                                </div>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="commodity">Commodity</label>
                                                        <input type="text" required class="form-control" id="commodity" placeholder="Please Enter Commodity Name *">      
                                                    </div>                                        
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="type">Type</label>                                                       
                                                            <select id="type" class="form-select">
                                                            <option value="">Please Select Type *</option>
                                                            <option value="Vegetable">Vegetable</option>
                                                            <option value="Spice">Spice</option>
                                                            <option value="Root Crop">Root Crop</option>
                                                            <option value="Fruit">Fruit</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="classcom">Class</label>                                                       
                                                            <select id="classcom" class="form-select">
                                                            <option value="">Please Select Class *</option>
                                                            <option value="Class A">Class A</option>
                                                            <option value="Class B">Class B</option>
                                                            <option value="Class C">Class C</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="sellingtype">Selling Type</label>                                                       
                                                            <select id="sellingtype" class="form-select">
                                                            <option value="">Please Select Selling Type *</option>
                                                            <option value="Farmgate">Farmgate</option>
                                                            <option value="Wholesale">Wholesale</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="price">Price</label>
                                                        <input type="text" required class="form-control" id="price" placeholder="Please Enter Price *">      
                                                    </div>                                        
                                                </div>


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
                            var commodity= $('#commodity').val();

                            var type= $('#type').val();
                            var classcom= $('#classcom').val();
                            var price= $('#price').val();
                            var sellingtype= $('#sellingtype').val();
                            var unit= $('#unit').val();
                         

                            // Send the dataArray to the PHP script
                            $.ajax({
                                    url:"commodityprocess.php",
                                    method:"POST",
                                    data:{code:code,commodity:commodity,type:type,classcom:classcom,price:price,sellingtype:sellingtype,unit:unit},
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
                                        
                                                <th>Code</th>
                                                <th>Commodity</th>
                                                <th>Type</th>
                                                <th>Class</th>
                                                <th>Selling Type</th>
                                                <th>Price</th>
                                                <th>Delete</th>
                                                
                                                                            
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                                include 'db.inc.php';
                                                $query1 = mysqli_query($conn,"SELECT * FROM commodityhubpos ORDER BY id DESC");
                                                while($result1 = mysqli_fetch_array($query1)): ?>
                                            <tr>
                                                                                
                                              
                                                <td><?php echo $result1 ['code']; ?></td>
                                                <td><?php echo $result1 ['commodity']; ?></td>
                                                <td><?php echo $result1 ['type']; ?></td>
                                                <td><?php echo $result1 ['classcom']; ?></td>
                                                <td><?php echo $result1 ['sellingtype']; ?></td>
                                            
                                                <td><?php echo $result1 ['price']; ?></td>
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