<?php
include 'db.inc.php';



session_start();


//session
$userprofile = $_SESSION['fname'];



$userid = $_SESSION['id'];                      
$usertype = $_SESSION['code'];        
$useruname = $_SESSION['uname'];
$userposition = $_SESSION['position'];
$userbday = $_SESSION['bday'];
$userage = $_SESSION['age'];
$usergender = $_SESSION['gender'];
$usercnumber = $_SESSION['cnumber'];
$usertype = $_SESSION['type'];
$userregval = $_SESSION['regval'];



// echo '-------------------------------------'.$userprofile;

if($userprofile==true){

   

} else {

    header("location:login.php");
}

$query= "SELECT * FROM usertablehubpos WHERE uname ='$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);


?>

<?php
                        if(isset($_POST['submit_incoming'])){
                            include_once 'db.inc.php';
                        //10

                        //start uploading of file

                        //start file1
                        $trans_comm=$_POST['trans_comm'];
                        $trans_type=$_POST['trans_type'];
                        $trans_sellingtype=$_POST['trans_sellingtype'];
                        $trans_class=$_POST['trans_class'];
                        $trans_price=$_POST['trans_price'];
                        $trans_volume=$_POST['trans_volume'];
                        $trans_date=$_POST['trans_date'];
                        $trans_year=$_POST['trans_year'];
                        $trans_day=$_POST['trans_day'];
                        $trans_time=$_POST['trans_time'];
                        $trans_encoder=$_POST['trans_encoder'];
                        $trans_month=$_POST['trans_month'];
                        $trans_value=$_POST['trans_value'];
                        $trans_code=$_POST['trans_code'];
                        $trans_payment=$_POST['trans_payment'];
                        $ftrans_day=$_POST['ftrans_day'];
                        $ftrans_month=$_POST['ftrans_month'];
                        $ftrans_year=$_POST['ftrans_year'];
                        $ftrans_time=$_POST['ftrans_time'];
                        $ftrans_date=$_POST['ftrans_date'];
                        $trans_partner=$_POST['trans_partner'];
                        $ftrans_encoder=$_POST['ftrans_encoder'];
                        $trans_adate=$_POST['trans_adate'];
                        $trans_commitvol=$_POST['trans_commitvol'];

                        $trans_status=$_POST['trans_status'];
                        $ftrans_code=$_POST['ftrans_code'];
                        
                        $trans_partnercode=$_POST['trans_partnercode'];
                        $trans_partnertype=$_POST['trans_partnertype'];
                         
                       


                        foreach($trans_comm as $index => $trans_comm)
                        {
                            $s_trans_comm = $trans_comm;
                            $s_ftrans_code = $ftrans_code[$index];
                            $s_trans_type = $trans_type[$index];
                            $s_trans_sellingtype = $trans_sellingtype[$index];
                            $s_trans_class = $trans_class[$index];
                            $s_trans_price = $trans_price[$index];
                            $s_trans_volume = $trans_volume[$index];
                            $s_trans_date = $trans_date[$index];
                            $s_trans_year = $trans_encoder[$index];

                            $s_trans_day = $trans_day[$index];
                            $s_trans_month = $trans_month[$index];
                            $s_trans_time = $trans_time[$index];
                            $s_trans_encoder = $trans_encoder[$index];
                            $s_trans_commitvol = $trans_commitvol[$index];
                           

                       
                        
                                   
                   
     
                         $sql = "INSERT INTO  transactionfinalhubpos (trans_comm,ftrans_code,trans_type,trans_sellingtype,trans_class,trans_price,trans_volume,trans_date,trans_year,trans_day,trans_month,trans_time,trans_encoder,trans_commitvol) VALUES  
                         ('$s_trans_comm','$s_ftrans_code','$s_trans_type','$s_trans_sellingtype','$s_trans_class','$s_trans_price','$s_trans_volume','$s_trans_date','$s_trans_year','$s_trans_day','$s_trans_month','$s_trans_time','$s_trans_encoder','$s_trans_commitvol')";
 
                         $query = mysqli_query($conn, $sql);
                     
                           
                        }

                            if($query){


                                $sql2 = "UPDATE transactiontemphubpos SET trans_value= '1' WHERE trans_encoder='$userid'";
                                
    
                            $query2 = mysqli_query($conn, $sql2);

                            

                           

                        }
 
                             if($query2){

                                 $sql3 = "INSERT INTO  transactionsdrhubpos (trans_partnercode,trans_partnertype,trans_code,trans_payment,ftrans_day,ftrans_month,ftrans_year,ftrans_time,ftrans_date,trans_partner,trans_adate,ftrans_encoder,trans_status) VALUES  
                                 ('$trans_partnercode','$trans_partnertype','$trans_code','$trans_payment','$ftrans_day','$ftrans_month','$ftrans_year','$ftrans_time','$ftrans_date','$trans_partner','$trans_adate','$ftrans_encoder','$trans_status')";
 
 
                                 $result = mysqli_query($conn, $sql3);
                                 //header("location:salesgeneratereceipt.php?print=$sales_rec_no");
                                 header("location:transactionsupply.php");
                             }

                             
 
                         } 
 
                     ?>
 