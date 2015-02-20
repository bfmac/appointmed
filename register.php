
<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$occupation = $_POST['occupation'];
	$birthdate = $_POST['birthdate'];
	$age = $_POST['age'];
	$patientname = $_POST['patientname'];

	include 'connectdatabase.php';
	//include 'Mail.php';
			
	$sqln = mysqli_query($con, "SELECT username FROM account WHERE username ='" .$username."' ");
	if(mysqli_num_rows($sqln) != 0){

		mysqli_close($con);
		echo "<script>alert('Userame exists')</script>";
	} else{
	
	//send to email
	/*$subject = 'You have registered to appointmed';
	$message =  'Thank you for registering to appointmed';
	$header = '$email';
	$from = '-fwebmaster@appointmed.com';
	mail($email, $subject, $message, "From:" .$from);
	echo 'email sent';*/

	//hash
	$password = hash('sha256', $password);

	//patient id
	$random = substr( md5(uniqid(rand(), true)), 0, 7);
	 
	$account_type = 'Patient';
	if($age <= 12){
		$patientcategory = 'Child';
	}else{
		$patientcategory = 'Adult';
	}

	$sqlaccount = "INSERT INTO account (username, password, account_type) VALUES('$username','$password', '$account_type')";
	$sqlpatient = "INSERT INTO patient (patient_id, username, email, patient_contact, occupation, birthdate, age, patient_name, patient_category) 
		VALUES('$random','$username','$email', '$contact','$occupation','$birthdate','$age','$patientname','$patientcategory')";


	if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $sqlpatient))) {
	  	die('Error: ' . mysqli_error($con));
	  }

	mysqli_close($con);

	header("location: index.php");
	}
	
} else{
	header("location: signup.php");
	die();
}

?>