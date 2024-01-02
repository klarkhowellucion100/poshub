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
    $chars = "003232303232023232023456789";
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
$finalcode='US'.date('Y').''.date('d').''.createRandomPassword().''.date('m');
?>
   <!-- start page title -->
    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Partner Registration</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Entry</a></li>
                                        <li class="breadcrumb-item active">Registration</li>
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
                                    <h4 class="card-title">Add Partner Details</h4>
                                    
                         

                                    <h4 style="color: royalblue; font-size:15px; margin-top: 20px;">I. Partner Details</h4>

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="code">Code</label>
                                                        <input type="text" required readonly class="form-control" id="code" value='<?php echo $finalcode;?>'>      
                                                    </div>                                        
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="mun">Type</label>                                                       
                                                            <select id="type" class="form-select">
                                                            <option value="">Please Select Type *</option>
                                                            <option value="Farmer">Farmer</option>
                                                            <option value="Vendor">Vendor</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="fname">Full Name</label>
                                                        <input type="text" required class="form-control" id="fname" placeholder='Please Enter First Name' name='fname'>      
                                                    </div>                                        
                                                </div>

                                              

                                                <div class="mb-3">
                                                    <div class="commo">
                                                        <label for="cnumber">Contact Number</label>
                                                        <input type="text" required class="form-control" id="cnumber" placeholder='Please Enter Contact Number' name='cnumber'>      
                                                    </div>                                        
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="region">Region</label>                                                       
                                                            <select id="region" class="form-select region_1 region_0 region_2">
                                                              <option value="">Pease Select Region *</option>
                                                                  <?php  
                                                                    $sql = "SELECT * FROM areashubpos GROUP BY region";
                                                                    $query = mysqli_query($conn, $sql);
                                                                  ?>
                                                                  <?php foreach($query as $q){ ?>  
                                                                      <option value="<?php echo $q ['region'];?>"><?php echo $q ['region'];?></option>
                                                                  <?php } ?>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <script>
                                                        $(document).ready(function(){

                                                        $('.region_1').change(function(){
                                                    
                                                            var region_1 = $('.region_1').val();                                                    
                                                                $.ajax({
                                                                    url:"partnerregistrationfetch.php",
                                                                    method:"POST",
                                                                    data:{region_1:region_1},
                                                                    success:function(data){
                                                                        $('.province_1').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="province">Province</label>                                                       
                                                            <select id="province" class="form-select province_1 province_2 province_0">
                                                              <option value="">Pease Select Province *</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <script>
                                                        $(document).ready(function(){

                                                        $('.province_0').change(function(){
                                                    
                                                            var region_0 = $('.region_0').val();   
                                                            var province_0 = $('.province_0').val();                                                 
                                                                $.ajax({
                                                                    url:"partnerregistrationfetch.php",
                                                                    method:"POST",
                                                                    data:{province_0:province_0,region_0:region_0},
                                                                    success:function(data){
                                                                        $('.mun_0').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>

                                                    


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="municipality">Municipality/City</label>                                                       
                                                            <select id="municipality" class="form-select mun_0 mun_01">
                                                            <option value="">Please Select Municipality/City *</option>
                                                            </select> 
                                                            </div>                                        
                                                    </div>
                                                </div> 

                                                <script>
                                                        $(document).ready(function(){

                                                        $('.mun_0').change(function(){
                                                    
                                                            var region_2 = $('.region_2').val();   
                                                            var province_2 = $('.province_2').val();     
                                                            var mun_01 = $('.mun_01').val();                                              
                                                                $.ajax({
                                                                    url:"partnerregistrationfetch.php",
                                                                    method:"POST",
                                                                    data:{province_2:province_2,region_2:region_2,mun_01:mun_01},
                                                                    success:function(data){
                                                                        $('.brgy_0').html(data);
                                                                    }
                                                                });
                                                        
                                                        });
                                                    
                                                        });
                                                    </script>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="commo">
                                                        <label for="barangay">Barangay</label>                                                       
                                                            <select id="barangay" class="form-select brgy_0">
                                                            <option value="">Please Select Barangay *</option>
                                                            </select> 
                                                            </div>                                        
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
                            var fname= $('#fname').val();

                            
                            var type= $('#type').val();
                            var cnumber= $('#cnumber').val();
                            var region= $('#region').val();
                            var province= $('#province').val();
                            var municipality= $('#municipality').val();
                            var barangay= $('#barangay').val();


                            // Send the dataArray to the PHP script
                            $.ajax({
                                    url:"partnerregistrationprocess.php",
                                    method:"POST",
                                    data:{code:code,fname:fname,type:type,cnumber:cnumber,region:region,province:province,municipality:municipality,barangay:barangay},
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
                                

                                <h4 class="card-title">Registered Partners</h4>

                                    <div class='open_data'>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                            <tr>
                                        
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>Type</th>
                                                <th>Delete</th>
                                                
                                                                            
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                                include 'db.inc.php';
                                                $query1 = mysqli_query($conn,"SELECT * FROM registrationhubpos ORDER BY id DESC");
                                                while($result1 = mysqli_fetch_array($query1)): ?>
                                            <tr>
                                                                                
                                              
                                                <td><?php echo $result1 ['code']; ?></td>
                                                <td><?php echo $result1 ['fname']; ?></td>
                                                <td><?php echo $result1 ['cnumber']; ?></td>
                                                <td><?php echo $result1 ['barangay']; ?>, <?php echo $result1 ['municipality']; ?>, <?php echo $result1 ['province']; ?>, <?php echo $result1 ['region']; ?></td>
                                            
                                                <td><?php echo $result1 ['type']; ?></td>
                                                <td> <a onClick="deleteme(<?php echo $result1['id'];?>)" class="btn  btn-raised btn-danger waves-effect">Delete</a></td>

                                                <script>
                                                    function deleteme(delid){
                                                        if(confirm("Are you sure you want to delete this data?")){
                                                        window.location.href='partnerregistrationprocess.php?delete=' +delid+ '';
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