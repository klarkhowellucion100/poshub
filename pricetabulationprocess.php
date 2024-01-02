

<?php
// pricetabulationprocess.php

// Include your database connection file
include 'db.inc.php';

if (isset($_POST['dataArray'])) {
    $dataArray = $_POST['dataArray'];

    // Now you can loop through $dataArray and save the data to the database
    foreach ($dataArray as $data) {
        // Sanitize data to prevent SQL injection
        $comm_f = mysqli_real_escape_string($conn, $data['comm_f']);
        $comm_prod = mysqli_real_escape_string($conn, $data['comm_prod']);
        $comm_prod_f = mysqli_real_escape_string($conn, $data['comm_prod_f']);
        $comm_fgpm_f = mysqli_real_escape_string($conn, $data['comm_fgpm_f']);
        $comm_fgp = mysqli_real_escape_string($conn, $data['comm_fgp']);
        $comm_fgp_f = mysqli_real_escape_string($conn, $data['comm_fgp_f']);
        $comm_wspm_f = mysqli_real_escape_string($conn, $data['comm_wspm_f']);
        $comm_wsppc_f = mysqli_real_escape_string($conn, $data['comm_wsppc_f']);
        $comm_wsp = mysqli_real_escape_string($conn, $data['comm_wsp']);
        $comm_wsp_f = mysqli_real_escape_string($conn, $data['comm_wsp_f']);
        $comm_srpm_f = mysqli_real_escape_string($conn, $data['comm_srpm_f']);
        $comm_srp_f = mysqli_real_escape_string($conn, $data['comm_srp_f']);
        $comm_diffp_f = mysqli_real_escape_string($conn, $data['comm_diffp_f']);
        $comm_priv = mysqli_real_escape_string($conn, $data['comm_priv']);
        $comm_date_f = mysqli_real_escape_string($conn, $data['comm_date_f']);
        $comm_type_f = mysqli_real_escape_string($conn, $data['comm_type_f']);
        // ... (repeat for other variables)

        // Check if $comm_priv is not empty
        $comm_priv = mysqli_real_escape_string($conn, $data['comm_priv']);
        if ($comm_priv !== "" && $comm_date_f !== "") {
            // Your database insertion query, adjust based on your actual table structure
        $insertQuery = "INSERT INTO comm_pospricenew (comm_f,comm_prod,comm_prod_f,comm_fgpm_f,comm_fgp,comm_fgp_f,comm_wspm_f,comm_wsppc_f,comm_wsp,comm_wsp_f,comm_srpm_f,comm_srp_f,comm_diffp_f,comm_priv,comm_date_f,comm_type_f) VALUES ('$comm_f','$comm_prod','$comm_prod_f','$comm_fgpm_f','$comm_fgp','$comm_fgp_f','$comm_wspm_f','$comm_wsppc_f','$comm_wsp','$comm_wsp_f','$comm_srpm_f','$comm_srp_f','$comm_diffp_f','$comm_priv','$comm_date_f','$comm_type_f')";
        
            // Perform the insertion
            $result = mysqli_query($conn, $insertQuery);

            // Check if the insertion was successful
            if (!$result) {
                // Handle the error as needed
                echo json_encode(['status' => 'error', 'message' => 'Error inserting data into the database']);
                exit; // Terminate script
            }
        }
    }

    // Provide a response back to the AJAX call
    echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>





<?php
if (isset($_GET['delete'])) {
    include_once 'db.inc.php';
   
   $id = $_GET['delete'];
   $query="DELETE FROM commodityhubpos WHERE id = $id";
   $result = mysqli_query($conn,$query); /*or die ("Cannot delete data from database.". mysqli_error($conn));
   if($fire) echo "Data deleted from database";*/


   header("location:commodity.php");

  // header("Location:courtorderentrytracker.php?deleted=success");
  // exit();
}
?>

