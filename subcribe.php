<?php 
   /* session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];

    if($loggedIn == false)
    header("location: index.php");
    else if($account_type != 'Patient')
    header("location: index.php");

    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
    $row =  mysqli_fetch_array($result);
    $patient = $row['patient_id'];
    $patient_n = $row['patient_name'];
    $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient' AND appointment_status = 'Inqueue' " );*/
    echo "<script> alert('Hooray');</script>";
?>