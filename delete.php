<?php

require('connect.php');
if (isset($_GET['FlavorID'])) {
    $strID = $_GET['FlavorID'];
}




$sql = "DELETE FROM flavor WHERE FlavorID = :FlavorID";
$stml = $conn->prepare($sql);
$stml->bindParam(':FlavorID', $_GET['FlavorID']);
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stml->execute()) {
    $message = "Successfully delete Flavor" . $_GET['FlavorID'] . ".";
    echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly delete Flavor information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
} else {
    $message = "Fail to delete Flavor information.";
}

$conn = null;

//header("Location:index.php");