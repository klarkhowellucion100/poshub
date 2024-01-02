<?php include_once 'heading.php';?>



                    <?php
                        $date_f = date('Y-m-d');

                        $date_t = date('H:i:s');
                        $date_m = date('m');
                        $date_d = date('d');
                        $date_y = date('Y');

                        $gen= "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwzyz";

                    ?>
            <form action="distributionentry.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-12">           
                              
                            <div class="card">                                
                                <div class="card-body">
                                        
                                    <h4 class="card-title">Add Collection<!--<a href="distribution.php" class="btn btn-info waves-effect waves-light">Exit</a>  -->                              
                                    </h4>
                                 
                                
                                        <div class="main-form">

                                            <div class="row">

                                                                                    <input style='display:none;' type="text" class="form-control" id="basicpill-firstname-input" name='code[]' value="DNo. <?php echo $date_m;?>-<?php echo $date_d;?>-<?php echo $date_y;?>-<?php echo substr(str_shuffle($gen),0,5); ?>" >
                                                                                    <textarea style='display:none;' name="mmonth[]" value="<?php echo $date_m;?>"><?php echo $date_m;?></textarea>
                                                                                    <textarea style='display:none;' name="mday[]" value="<?php echo $date_d;?>"><?php echo $date_d;?></textarea>
                                                                                    <textarea style='display:none;' name="myear[]" value="<?php echo $date_y;?>"><?php echo $date_y;?></textarea>
                                                                                    <textarea style='display:none;' name="mtime[]" value="<?php echo $date_t;?>"><?php echo $date_t;?></textarea>
                                                                                    <textarea style='display:none;' name="mfull[]" value="<?php echo $date_f;?>"><?php echo $date_f;?></textarea>

                                                                                    <textarea style='display:none;' name="fnameq[]" value="<?php echo $userprofile;?>"><?php echo $userprofile;?></textarea>
                                                                                    <textarea style='display:none;' name="mnameq[]" value="<?php echo $usermname;?>"><?php echo $usermname;?></textarea>
                                                                                    <textarea style='display:none;' name="lnameq[]" value="<?php echo $userlname;?>"><?php echo $userlname;?></textarea>
                                                <div class="col-md-3">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nname">Name of Supplier</label>
                                                            <input type="text" class="form-control" id="nname" name='nname[]' placeholder="Please Enter Name of Supplier *">
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="orgn">Delivery Date</label>
                                                            <input type="date" class="form-control" id="ndtdr" name='ndtdr[]'>
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="ntmar">Delivery Time</label>
                                                            <input type="time" class="form-control" id="ntmar" name='ntmar[]'>
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nestc">Estimated Cargo Weight</label>
                                                            <input type="text" class="form-control" id="nestc" name='nestc[]' placeholder="Please Enter Estimate Cargo Weight *">
                                                        </div>                                             
                                                    </div>
                                                </div>


                                                <h5 style='color:royalblue; font-size: 15px;'>Address</h5>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="region">Region</label>
                                                                    <select class="form-select" id="region" name="nadreg[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="province">Province</label>
                                                                    <select class="form-select" id="province" name="naprov[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="city">City/Municipality</label>
                                                                    <select class="form-select" id="city" name="namun[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="barangay">Barangay</label>
                                                                    <select class="form-select" id="barangay" name="nabrgy[]"></select>                                
                                                    </div>
                                                </div>

                                                <h5 style='color:royalblue; font-size: 15px;'>Point of Origin</h5>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="region">Region</label>
                                                                    <select class="form-select" id="region2" name="npreg[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="province">Province</label>
                                                                    <select class="form-select" id="province2" name="npprv[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="city">City/Municipality</label>
                                                                    <select class="form-select" id="city2" name="npmun[]"></select>                                
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="barangay">Barangay</label>
                                                                    <select class="form-select" id="barangay2" name="npbrg[]"></select>                                
                                                    </div>
                                                </div>


                                               

                                                <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
                                                <script type="text/javascript">
                                                    
                                                    var my_handlers = {

                                                        fill_provinces:  function(){

                                                            var region_code = $(this).val();
                                                            $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                                                            
                                                        },

                                                        fill_cities: function(){

                                                            var province_code = $(this).val();
                                                            $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                                                        },


                                                        fill_barangays: function(){

                                                            var city_code = $(this).val();
                                                            $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                                                        }
                                                    };

                                                    var my_handlers2 = {

                                                            fill_provinces2:  function(){

                                                                var region_code2 = $(this).val();
                                                                $('#province2').ph_locations('fetch_list', [{"region_code": region_code2}]);
                                                                
                                                            },

                                                            fill_cities2: function(){

                                                                var province_code2 = $(this).val();
                                                                $('#city2').ph_locations( 'fetch_list', [{"province_code": province_code2}]);
                                                            },


                                                            fill_barangays2: function(){

                                                                var city_code2 = $(this).val();
                                                                $('#barangay2').ph_locations('fetch_list', [{"city_code": city_code2}]);
                                                            }
                                                            };

                                                   
                                                    $(function(){
                                                        $('#region').on('change', my_handlers.fill_provinces);
                                                        $('#province').on('change', my_handlers.fill_cities);
                                                        $('#city').on('change', my_handlers.fill_barangays);

                                                        $('#region').ph_locations({'location_type': 'regions'});
                                                        $('#province').ph_locations({'location_type': 'provinces'});
                                                        $('#city').ph_locations({'location_type': 'cities'});
                                                        $('#barangay').ph_locations({'location_type': 'barangays'});

                                                        $('#region').ph_locations('fetch_list');



                                                        $('#region2').on('change', my_handlers2.fill_provinces2);
                                                        $('#province2').on('change', my_handlers2.fill_cities2);
                                                        $('#city2').on('change', my_handlers2.fill_barangays2);

                                                        $('#region2').ph_locations({'location_type': 'regions'});
                                                        $('#province2').ph_locations({'location_type': 'provinces'});
                                                        $('#city2').ph_locations({'location_type': 'cities'});
                                                        $('#barangay2').ph_locations({'location_type': 'barangays'});

                                                        $('#region2').ph_locations('fetch_list');
                                                    });
                                                </script>




                                                <div class="col-md-4">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="ncont">Contact Number</label>
                                                            <input type="text" class="form-control" id="ncont" name='ncont[]' placeholder="Please Enter Contact Number *">
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nvehi">Vehicle Make and Model</label>
                                                            <input type="text" class="form-control" id="nvehi" name='nvehi[]' placeholder="Please Enter Vehicle Type *">
                                                        </div>                                             
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                        <div class="mb-3">                                                        
                                                        <div class="mb-1 position-relative">
                                                            <label class="form-label" for="nvenu">Vehicle Plate Number</label>
                                                            <input type="text" class="form-control" id="nvenu" name='nvenu[]' placeholder="Please Enter Contact Number *">
                                                        </div>                                             
                                                    </div>
                                                </div>

<!--#######################################################################################################################################################################################################################-->
                                                <h5 style='color:crimson; font-size: 15px; margin-top: 20px;'>Particulars</h5>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="dcoty">Type</label>
                                                            <select class="form-select" id="dcoty" name="dcoty[]" onChange="populate('dcoty','subcommodity01')">
                                                                <option value="Condiment">Condiment</option>
                                                                <option value="Root Crop">Root Crop</option>
                                                                <option value="Vegetable">Vegetable</option>
                                                                <option value="Fruit">Fruit</option>
                                                                <option value="Food Animal">Food Animal</option>
                                                                <option value="Grain">Grain</option>
                                                            </select>                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="dcom">Commodity</label>
                                                            <select class="form-select" id="dcom" name="dcom[]">
                                                                <option value="Bell Pepper">Bell Pepper</option>
                                                            </select>                                
                                                    </div>
                                                </div>

<!--#######################################################################################################################################################################################################################-->
                                   
                                        </div>

                                        <div class="paste-new-forms"></div>

                                        </div>
                           
                                </div>
                            </div>
                            <!-- end card -->
                          
                         <a href="javascript:void(0)" class='add-more-form btn btn-warning'>Add Row</a> 
                            <input type="submit" name="submit_targetdist" value='Submit Entries' class="btn btn-primary waves-effect waves-light">
                        </div>
                       
                
                        <!-- end col -->
</div>
</form>


<script>
    $(document).ready(function(){
        $(document).on('click', '.remove-btn', function(){
                $(this).closest('.main-form').remove();
        });
        $(document).on('click', '.add-more-form', function(){
            $('.paste-new-forms').append('<div class="main-form">\
            <hr style="width: 100%; height:7px; border: 0 none; margin-right: auto; margin-left:auto; color: royalblue;">\
                                            <div class="row">\
                                            <input style="display:none;" type="text" class="form-control" id="basicpill-firstname-input" name="code[]" value="<?php echo substr(str_shuffle($gen),0,5); ?>" >\
                                                                                    <textarea style="display:none;" name="stan[]" value="<?php echo $agnc;?>"><?php echo $agnc;?></textarea>\
                                                                                    <textarea style="display:none;" name="phase[]" value="Distribution">Distribution</textarea>\
                                                                                    <textarea style="display:none;" name="enlme[]" value="<?php echo $userlname;?>"><?php echo $userlname;?></textarea>\
                                                                                    <textarea style="display:none;" name="dtpha[]" value="<?php echo date("Y");?>"><?php echo date("Y");?></textarea>\
                                                                                    <textarea style="display:none;" name="mnth[]" value="<?php echo date("m");?>"><?php echo date("m");?></textarea><div class="col-md-3">\
                                                        <div class="mb-3"><div class="mb-1 position-relative">\
                                                            <label class="form-label" for="orgn">Organization</label>\
                                                            <input type="text" class="form-control" id="orgn" name="orgn[]" placeholder="Please Enter Organization Name">\
                                                        </div></div></div>\
                                                         <div class="col-md-3">\
                                                         <div class="mb-3">\
                    <label for="commodity01">Fund Source</label>\
                    <select class="form-select" id="commodity01" name="fnds[]" onChange="populate("commodity01","subcommodity01")">\
                        <option value="">Select Commodity</option>\
                        <option value="Rice">Rice</option>\
                        <option value="Corn">Corn</option>\
                        <option value="High Value Crops">High Value Crops</option>\
                        <option value="Livestock and Poultry">Livestock and Poultry</option>\
                    </select></div>\
            </div>\
            <div class="col-md-3">\
                <div class="mb-3">\
                   <label for="commodity">Commodity</label>\
                        <select class="form-select" id="commodity" name="comm[]">\
                            <option value="">Select Commodity</option>\
                            <?php   $sql = "SELECT * FROM commodity";$query = mysqli_query($conn, $sql);?>
                                <?php 
                                error_reporting(0);
                                foreach($query as $q){ ?>
                                <option value="<?php echo $q['commodity']; ?>"><?php echo $q['commodity']; ?></option>\
                                <?php } ?>
                           </select></div></div>\
                           <div class="col-md-3">\
                                <div class="mb-3">\
                                    <label for="uoms">Unit of Measurement</label>\
                                        <select class="form-select" id="uoms" name="uoms[]">\
                                            <option value="">Select UOM</option>\
                                            <option value="piece">Piece</option>\
                                            <option value="kilogram">Kilogram</option>\
                                            <option value="number">Number</option>\
                                            <option value="heads">Heads</option></select> </div></div>\
                                </div>\
                         <div class="row" style="margin-top:30px;">\
                                                        <h5 style="color:crimson">Distribution Data</h5>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="jantdamt">January</label>\
                                                        <input type="text" class="form-control" id="jantdamt" name="jantdamt[]" placeholder="Quantity">\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="febtdamt">February</label>\
                                                        <input type="text" class="form-control" id="febtdamt" name="febtdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="martdamt">March</label>\
                                                        <input type="text" class="form-control" id="martdamt" name="martdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                    <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="aprtdamt">April</label>\
                                                        <input type="text" class="form-control" id="aprtdamt" name="aprtdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                    <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="maytdamt">May</label>\
                                                        <input type="text" class="form-control" id="maytdamt" name="maytdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                 <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="juntdamt">June</label>\
                                                        <input type="text" class="form-control" id="juntdamt" name="juntdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                            <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="jultdamt">July</label>\
                                                        <input type="text" class="form-control" id="jultdamt" name="jultdamt[]" placeholder="Quantity">\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="augtdamt">August</label>\
                                                        <input type="text" class="form-control" id="augtdamt" name="augtdamt[]" placeholder="Quantity">\
                                                    </div>\
                                                </div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="septdamt">September</label>\
                                                        <input type="text" class="form-control" id="septdamt" name="septdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="octtdamt">October</label>\
                                                        <input type="text" class="form-control" id="octtdamt" name="octtdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="novtdamt">November</label>\
                                                        <input type="text" class="form-control" id="novtdamt" name="novtdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                                <div class="col-md-1">\
                                                    <div class="mb-1 position-relative">\
                                                        <label class="form-label" for="dectdamt">December</label>\
                                                        <input type="text" class="form-control" id="dectdamt" name="dectdamt[]" placeholder="Quantity">\
                                                    </div></div>\
                                        </div><button class="remove-btn btn btn-danger" type="button">Remove</button>');
        });
    });
</script>

<?php include_once 'footer.php';?>
