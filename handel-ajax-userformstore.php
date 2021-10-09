<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  echo json_encode(array('Status'=>'Database Connection Error'));
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['phonenumber']) ){
    if($_POST['pass']===$_POST['cpass']){
 $fname =  $_POST['firstname'];
 $lname = $_POST['lastname']; 
 $email = $_POST['email'];
 $pass = $_POST['pass'];
 $cpass = $_POST['cpass'];
 $phonenumber = $_POST['phonenumber'];

$sql = "INSERT INTO  users_table (firstname, lastname, email, password, phonenumber)
VALUES ('$fname', '$lname', '$email' ,'$pass', '$phonenumber')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('Status'=>'New record created successfully'));
  } else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
    echo json_encode(array('Status'=>$error));
  }
}else{
    echo json_encode(array('Status'=>'Record not inserted - Password and confirm password does not match'));
}
}else{
    echo json_encode(array('Status'=>'Record not inserted - Please check required form input fields'));
}
?>