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


include 'db.inc.php';

if(isset($_POST['displaySend'])){
    $table='
    
    

    <div class="table-responsive">
       
                    <table class="table  mb-0" id="table_transaction">
                                <thead>
                                    <tr>

                                
                                               <th>Comm</th>    
                                               <th>Class</th>  
                                               <th>Kg</th>    
                                                                            
                                    </tr>
                                </thead>';

    $table.='<tbody>';

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
    $finalcode='CM'.date('Y').''.date('d').''.createRandomPassword().''.date('m');


    $sql="SELECT * FROM transactiontemphubpos WHERE trans_value= '0' AND trans_encoder = '$userid' AND trans_sellingtype='Farmgate'";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($result)){

    
      $trans_id = $row['trans_id'];
      $trans_comm = $row['trans_comm'];
      $trans_type = $row['trans_type'];
      $trans_sellingtype = $row['trans_sellingtype'];
      $trans_class = $row['trans_class'];
      $trans_price = $row['trans_price'];
      $trans_volume = $row['trans_volume'];
      $trans_commitvol = $row['trans_commitvol'];
      $trans_date = $row['trans_date'];

      $trans_year = $row['trans_year'];
      $trans_day = $row['trans_day'];
      $trans_time = $row['trans_time'];
      $trans_encoder = $row['trans_encoder'];
      $trans_value = $row['trans_value'];
      $trans_month = $row['trans_month'];
        

        $trans_sub_total = $trans_price*$trans_volume;

       
   
    
      

  

 
        $table.='<tr>';
                    
        $table.='<td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_comm.'" name="trans_comm[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_type.'" name="trans_type[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_sellingtype.'" name="trans_sellingtype[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_class.'" name="trans_class[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_price.'" name="trans_price[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_volume.'" name="trans_volume[]">
                </td>
                <td style="display:none;">
                <input type="text" class="form-control" value="'.$trans_commitvol.'" name="trans_commitvol[]">
          </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_date.'" name="trans_date[]">
                </td>
                 <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_year.'" name="trans_year[]">
                </td>
                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$trans_day.'" name="trans_day[]">
                </td>
                <td style="display:none;">
                <input type="text" class="form-control" value="'.$trans_time.'" name="trans_time[]">
          </td>
          <td style="display:none;">
                <input type="text" class="form-control" value="'.$trans_encoder.'" name="trans_encoder[]">
          </td>
          <td style="display:none;">
                <input type="text" class="form-control" value="'.$trans_month.'" name="trans_month[]">
          </td>
          <td style="display:none;">
                <input type="text" class="form-control" value="1" name="trans_value[]">
          </td>

               

                
                <td style="display:none;"><input type="text" class="form-control" name="ftrans_code[]" value="'.$finalcode.'"></td>
            
              
                <td>'.$trans_comm.'</td>
                <td>'.$trans_class.'</td>
                <td>'.$trans_commitvol.'</td>';

                


         $table.='<td>
                    <button class="btn btn-danger" onclick="DeleteUser('.$trans_id.')" id="delete_bot"><i class="uil-trash-alt"></i></button>
                </td>'; 
        $table.='</tr>'; 
                
                   
    }
 
                            
}



$sql="SELECT SUM(pay_subtotal),SUM(trans_commitvol) FROM `viewtemp_subtot` WHERE trans_value= '0' AND trans_encoder = '$userid'";
    $result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){

$prod_total=$row['SUM(trans_commitvol)'];

$table.='</tbody>';



$table.='<tfoot>

<tr>

<tr style="display:none;" >
  <td >Receipt No.:</td>
  <td colspan="3"><input class="form-control" name="trans_code" readonly type="text" value="'.$finalcode.'" ></td>
</tr>

<tr><td >Receipt No:</td><td colspan="3" style="color:crimson; font-weight:bold;">'.$finalcode.'</td></tr>

<tr style="display:none;" >
  <td >Total:</td>
  <td colspan="3"><input class="form-control" name="trans_payment" readonly type="text" value="'.$prod_total.'" ></td>
</tr>

<tr><td >Total:</td><td colspan="3" style="color:crimson; font-weight:bold;">'.$prod_total.' kg</td></tr>



<tr style="display:none;" >
  <td >Volume:</td>
  <td colspan="3"><input class="form-control" name="ftrans_encoder" readonly type="text" value="'.$userid.'" ></td>
</tr>



<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mday" name="ftrans_day" value="'.$date_d.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mmonth" name="ftrans_month" value="'.$date_m.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="myear" name="ftrans_year" value="'.$date_y.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mtime" name="ftrans_time" value="'.$date_t.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mfull" name="ftrans_date" value="'.$date_f.'"></td></tr>

</tr>


</tfoot></table></div>';}
echo $table;
?>







