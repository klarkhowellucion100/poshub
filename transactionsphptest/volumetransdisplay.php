<?php
include 'db.inc.php';



session_start();


//session
$userprofile = $_SESSION['fname'];
$userpic = $_SESSION['pfile'];


$userid = $_SESSION['id'];                      
$usertype = $_SESSION['code'];        
$useruname = $_SESSION['uname'];
$userposition = $_SESSION['position'];
$useroffice = $_SESSION['office'];
$userbday = $_SESSION['bday'];
$userage = $_SESSION['age'];
$usergender = $_SESSION['gender'];
$usercnumber = $_SESSION['cnumber'];
$usereadd = $_SESSION['eaddr'];
$userpdoc = $_SESSION['pdoc'];
$usertype = $_SESSION['type'];
$userregval = $_SESSION['regval'];
$useracro = $_SESSION['acro'];



// echo '-------------------------------------'.$userprofile;

if($userprofile==true){

   

} else {

    header("location:login.php");
}

$query= "SELECT * FROM usertable WHERE uname ='$userprofile'";
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
                                               <th>Unit</th>    
                                               <th>Kg</th> 
                                               <th>Sub</th>
                                                                            
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
    $finalcode='DR-'.$useracro.'-'.date('Y').'-'.date('d').''.createRandomPassword().''.date('m');


    $sql="SELECT * FROM volumetemp WHERE comval= '0' AND encoder = '$userid'";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($result)){

    
      $id = $row['id'];
      $encoder = $row['encoder'];
      $dcom = $row['dcom'];
      $dcoty = $row['dcoty'];
      $dunt = $row['dunt'];
      $deuw = $row['deuw'];
      $dund = $row['dund'];
      $drate = $row['drate'];

      $cmonth = $row['cmonth'];
      $cday = $row['cday'];
      $cyear = $row['cyear'];
      $ctime = $row['ctime'];
      $cfull = $row['cfull'];
        

        $dr_sub_total = $drate*$dund;

       
   
    
      

  

 
        $table.='<tr>';
                    
        $table.='<td style="display:none;">
                      <input type="text" class="form-control" value="'.$dcom.'" name="dcom[]">
                </td>

                <td style="display:none;">
                      <input type="text" class="form-control" value="'.$id.'" name="id[]">
                </td>

                
                <td style="display:none;" ><input type="text" class="form-control" name="code[]" value="'.$finalcode.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="dunt[]" value="'.$dunt.'"></td>

                <td style="display:none;"><input type="text" class="form-control" name="dcoty[]" value="'.$dcoty.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="encoder[]" value="'.$encoder.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="deuw[]" value="'.$deuw.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="dund[]" value="'.$dund.'"></td>              
                <td style="display:none;"><input type="text" class="form-control" name="drate[]" value="'.$drate.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="comval[]" value="1"></td>

                <td style="display:none;"><input type="text" class="form-control" name="cmonth[]" value="'.$cmonth.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="cday[]" value="'.$cday.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="cyear[]" value="'.$cyear.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="ctime[]" value="'.$ctime.'"></td>
                <td style="display:none;"><input type="text" class="form-control" name="cfull[]" value="'.$cfull.'"></td>

                <td>'.$dcom.'</td>
                <td>'.$dunt.'</td>
                <td>'.$dund.'</td>
                <td>'.$dr_sub_total.'</td>';

                


         $table.='<td>
                    <button class="btn btn-danger" onclick="DeleteUser('.$id.')" id="delete_bot"><i class="uil-trash-alt"></i></button>
                </td>'; 
        $table.='</tr>'; 
                
                   
    }
 
                            
}



$sql="SELECT SUM(pay_subtotal), SUM(vol_subtot) FROM `viewtemp_subtot` WHERE comval= '0' AND encoder = '$userid'";
    $result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){

$prod_total=$row['SUM(pay_subtotal)'];
$vol_total=$row['SUM(vol_subtot)'];

$table.='</tbody>';



$table.='<tfoot>

<tr>

<tr style="display:none;" >
  <td >Receipt No.:</td>
  <td colspan="3"><input class="form-control" name="recno" readonly type="text" value="'.$finalcode.'" ></td>
</tr>

<tr><td >Receipt No:</td><td colspan="3" style="color:crimson; font-weight:bold;">'.$finalcode.'</td></tr>

<tr style="display:none;" >
  <td >Total:</td>
  <td colspan="3"><input class="form-control" name="dfees" readonly type="text" value="'.$prod_total.'" ></td>
</tr>

<tr><td >Total:</td><td colspan="3" style="color:crimson; font-weight:bold;">Php '.$prod_total.'</td></tr>

<tr style="display:none;" >
  <td >Volume:</td>
  <td colspan="3"><input class="form-control" name="volest" readonly type="text" value="'.$vol_total.'" ></td>
</tr>

<tr><td >Delivered Volume:</td><td colspan="3" style="color:crimson; font-weight:bold;">'.$vol_total.' kg</td></tr>

<tr style="display:none;" >
  <td >Volume:</td>
  <td colspan="3"><input class="form-control" name="encodv" readonly type="text" value="'.$userid.'" ></td>
</tr>



<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mday" name="mday" value="'.$date_d.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mmonth" name="mmonth" value="'.$date_m.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="myear" name="myear" value="'.$date_y.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mtime" name="mtime" value="'.$date_t.'"></td></tr>
<tr style="display:none;"><td colspan="3"><input type="text" class="form-control" id="mfull" name="mfull" value="'.$date_f.'"></td></tr>

</tr>


</tfoot></table></div>';}
echo $table;
?>







