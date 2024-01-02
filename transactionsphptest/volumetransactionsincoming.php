<?php
                        if(isset($_POST['submit_incoming'])){
                            include_once 'db.inc.php';
                        //10

                        //start uploading of file

                        //start file1
                        $id=$_POST['id'];
                        $code=$_POST['code'];
                        $mmonth=$_POST['mmonth'];
                        $mday=$_POST['mday'];
                        $myear=$_POST['myear'];
                        $mtime=$_POST['mtime'];
                        $mfull=$_POST['mfull'];
                        $nname=$_POST['nname'];
                        $ndtdr=$_POST['ndtdr'];
                        $nadreg=$_POST['nadreg'];
                        $naprov=$_POST['naprov'];
                        $namun=$_POST['namun'];
                        $nabrgy=$_POST['nabrgy'];
                        $ncont=$_POST['ncont'];
                        $nvehi=$_POST['nvehi'];
                        $nvenu=$_POST['nvenu'];
                        $npreg=$_POST['npreg'];
                        $npprv=$_POST['npprv'];
                        $npmun=$_POST['npmun'];
                        $npbrg=$_POST['npbrg'];
                        $ntmar=$_POST['ntmar'];
                        $dcoty=$_POST['dcoty'];
                        $dcom=$_POST['dcom'];
                        $dunt=$_POST['dunt'];
                        $deuw=$_POST['deuw'];
                        $drate=$_POST['drate'];
                        $dund=$_POST['dund'];
                        $recam=$_POST['recam'];
                        $redtp=$_POST['redtp'];
                        $ofinp=$_POST['ofinp'];
                        $comval=$_POST['comval'];
                        $encoder=$_POST['encoder'];
                        $recno=$_POST['recno'];
                        $dfees=$_POST['dfees'];

                        $encodv=$_POST['encodv'];

                        $cmonth=$_POST['cmonth'];
                        $cday=$_POST['cday'];
                        $cyear=$_POST['cyear'];
                        $ctime=$_POST['ctime'];
                        $cfull=$_POST['cfull'];

                        $volest=$_POST['volest'];

                        $file = $_FILES['file'];
   
                        $fileName = $_FILES ['file']['name'];
                        $fileTmpName = $_FILES ['file']['tmp_name'];
                        $fileSize = $_FILES ['file']['size'];
                        $fileError = $_FILES ['file']['error'];
                        $fileType = $_FILES ['file']['type'];
                    
                        $fileExt = explode('.',$fileName);
                        $fileActualExt = strtolower (end($fileExt));
                        
                        $allowed = array ('jpg', 'jpeg', 'png', 'pdf');
                    
                    
                    
                        $fileNameNew = uniqid ('',true).".".$fileActualExt;
                        $fileDestination = 'rec/'.$fileNameNew;
                        move_uploaded_file ($fileTmpName,$fileDestination);


                        foreach($code as $index => $code)
                        {
                            $s_code = $code;
                            $s_dcoty = $dcoty[$index];
                            $s_dcom = $dcom[$index];
                            $s_dunt = $dunt[$index];
                            $s_deuw = $deuw[$index];
                            $s_drate = $drate[$index];
                            $s_dund = $dund[$index];
                            $s_encoder = $encoder[$index];

                            $s_cmonth = $cmonth[$index];
                            $s_cday = $cday[$index];
                            $s_cyear = $cyear[$index];
                            $s_ctime = $ctime[$index];
                            $s_cfull = $cfull[$index];
                           

                       
                        
                                   
                   
     
                         $sql = "INSERT INTO  volume (code,dcoty,dcom,dunt,deuw,drate,dund,encoder,cmonth,cday,cyear,ctime,cfull) VALUES  
                         ('$s_code','$s_dcoty','$s_dcom','$s_dunt','$s_deuw','$s_drate','$s_dund','$s_encoder','$s_cmonth','$s_cday','$s_cyear','$s_ctime','$s_cfull')";
 
                         $query = mysqli_query($conn, $sql);
                     
                           
                        }

                            if($query){

                                foreach($id as $index => $id)
                            {
                                $s_id = $id;
                                $s_comval = $comval[$index];

                                $sql2 = "UPDATE volumetemp SET id= '".$s_id."',            
                                comval= '".$s_comval."' WHERE id = '".$s_id."'";
                                
    
                            $query2 = mysqli_query($conn, $sql2);

                            }

                           

                        }
 
                             if($query2){

                                 $sql3 = "INSERT INTO  drvolume (file, encoder, volest, dfees,mmonth,mday,myear,mtime,mfull,nname,ndtdr,nadreg,naprov,namun,nabrgy,ncont,nvehi,nvenu,npreg,npprv,npmun,npbrg,ntmar,recno,recam,redtp,ofinp) VALUES  
                                 ('$fileNameNew','$encodv','$volest','$dfees','$mmonth','$mday','$myear','$mtime','$mfull','$nname','$ndtdr','$nadreg','$naprov','$namun','$nabrgy','$ncont','$nvehi','$nvenu','$npreg','$npprv','$npmun','$npbrg','$ntmar','$recno','$recam','$redtp','$ofinp')";
 
 
                                 $result = mysqli_query($conn, $sql3);
                                 //header("location:salesgeneratereceipt.php?print=$sales_rec_no");
                                 header("location:volumereceipt.php?print=$recno");
                             }

                             
 
                         } 
 
                     ?>
 