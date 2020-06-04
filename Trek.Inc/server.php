<?php 
session_start();

$conn = mysqli_connect('localhost','root','','project');

if($conn){
echo "You are now signed in :</br>";	
}



$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dobmonth = $_POST['DOBmonth'];
$dobday = $_POST['DOBday'];
$dobyear = $_POST['DOBYear'];
$email = $_POST['Email'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$sql = "select * from gym where Username='$username' and Password= '$password'";

$result = mysqli_query($conn, $sql);

$num= mysqli_num_rows($result);

if($num == 1){
  echo "This username has already been used";	
}
else { 
$query = "insert into gym (First_name, Last_name, Mobile_number, Gender, Date_of_birth, Email, Username, Password) values ('$firstname','$lastname', '$mobile', '$gender', '$dobmonth-$dobday-$dobyear','$email','$username','$password')";
mysqli_query($conn, $query);
$myobj = NULL;
$myObj->firstname = $firstname;
$myObj->lastname = $lastname;
$myObj->mobile = $mobile;
$myObj->email = $email;
$myObj->username = $username;

$myJSON = json_encode($myObj);

echo $myJSON;
}
header('location:');
?>