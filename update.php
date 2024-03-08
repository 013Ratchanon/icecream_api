<?php

if (isset($_POST['FlavorID']) && isset($_POST['FlavorName']) && isset($_POST['Flavorprice'])) {
    require 'connect.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $FlavorID = $_POST['FlavorID'];
    $FlavorName = $_POST['FlavorName'];
    $Flavorprice =  $_POST['Flavorprice'];

    echo 'FlavorID = ' . $FlavorID;
    echo 'FlavorName = ' . $FlavorName;
    echo 'Flavorprice = ' . $Flavorprice;


    $sql =
        "UPDATE flavor SET FlavorName = :FlavorName, Flavorprice = :Flavorprice WHERE FlavorID = :FlavorID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':FlavorName', $_POST['FlavorName']);
    $stmt->bindParam(':Flavorprice', $_POST['Flavorprice']);
    $stmt->bindParam(':FlavorID', $_POST['FlavorID']);



    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update Flavor information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
