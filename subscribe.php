<?php 
   include 'connectdatabase.php';
    $doc = $_POST['doctor'];
    $pat = $_POST['patient'];
    echo $doc;
    echo $pat;

    $sql = "INSERT INTO subscribe (doctor_id, patient_id) 
    VALUES ('$doc', '$pat')";
    mysqli_query($con, $sql) or die (mysqli_error());
    //mysqli_query($con, $sql2) or die (mysqli_error());

    mysqli_close($con);
    header("location: profile.php");
    echo "<script> alert('you are subscribed');</script>";
?>