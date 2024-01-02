<?php include_once 'heading.php';?>



<?php
if (isset($_GET['update'])) {
    include_once 'db.inc.php';
   
   $id = $_GET['update'];
   $query="SELECT * FROM usertable WHERE id = $id";
   $result = mysqli_query($conn,$query); /*or die ("Cannot delete data from database.". mysqli_error($conn));
   if($fire) echo "Data deleted from database";*/
 
   
   $row = $result->fetch_array();

//10

$id= $row['id'];
$fname= $row['fname'];
$position= $row['position'];
$uname= $row['uname'];
$pword= $row['pword'];
$type= $row['type'];
$status= $row['status'];
$regval= $row['regval'];


}


   ?>
   <!-- start page title -->
    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Registration</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Registered</a></li>
                                        <li class="breadcrumb-item active">Employees</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                  

                    <div class="row">
                 
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                  <!--  <h4 class="card-title">Action</h4> -->
                                    
                                    <form action="pendingregistrationfunction.php" method="POST" enctype="multipart/form-data">

                                    <h4 style="color: royalblue; font-size:15px; margin-top: 20px;">Action</h4>


                                                <div class="mb-3" style="display:none;">
                                                    <div class="commo">
                                                        <label for="id">ID</label>
                                                        <input type="text" required class="form-control" id="id" value="<?php echo $id;?>" readonly name='id'>      
                                                    </div>                                        
                                                </div>

                                                <div class="row">
                                                        
                                                    

                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="fname">Full Name</label>
                                                                <input type="text" required class="form-control" id="fname" readonly value="<?php echo $fname;?>">      
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                  
                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="position">Position</label>
                                                                <input type="text" required class="form-control" id="position" readonly value="<?php echo $position;?>">      
                                                            </div>                                        
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="type">Role</label>
                                                                <select class="form-select type_selection_class" aria-label="Default select example" id="type" name="type">
                                                                    <option value="<?php echo $type;?>"><?php echo $type;?></option> 
                                                                    <option value="Admin">Admin</option> 
                                                                    <option value="Employee">Employee</option> 
                                                                            
                                                                </select>   
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="mb-3">
                                                            <div class="commo">
                                                                <label for="regval">Status</label>
                                                                <select class="form-select type_selection_class" aria-label="Default select example" id="type" name="regval">
                                                                    <option value="<?php echo $regval;?>"><?php echo $regval;?></option> 
                                                                    <option value="Accept">Accept</option> 
                                                                    <option value="Deny">Deny</option> 
                                                                            
                                                                </select>   
                                                            </div>                                        
                                                        </div>
                                                    </div>

                                                   
                                                </div>



                                             
                                         

                                               

                                                <input type="submit"  name="update" value='Update' class="btn btn-success waves-effect waves-light">
                                             
                                    </form>

                                    <button class="btn btn-warning waves-effect waves-light" style="margin-left:80px; margin-top:-65px;"><a style="color:#fff;" href="pendingregistration.php"> Exit </a></button>


                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card-->
                                
                            </div>
                     
                
                        <!-- end col-->

                   
                        
                        </div>

                      
                    

<?php include_once 'footer.php';?>