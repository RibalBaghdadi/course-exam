<?php 
// Validating Name
if(empty($_POST["name"])){
    die("Name is Required");
}

// Validating Email
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

// Validating Password
// Password must be at least 8 characters 
if(strlen($_POST["password"])<8){
    die("Password must be at least 8 characters");
}

// Password must at least contain 1 uppercase letter
if(!preg_match("@[A-Z]@", $_POST["password"])){
    die("Password must at least contain 1 uppercase letter");
}

// Password must at least contain 1 number
if(!preg_match("@[0-9]@", $_POST["password"])){
    die("Password must at least contain 1 number");
}

// Password must at least contain 1 special character
if(!preg_match("@[^\w]@", $_POST["password"])){
    die("Password must at least contain 1 special character");
}

// Password must match
if($_POST["password"]!=$_POST["password_confirmation"]){
    die("Password must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
// var_dump($password_hash);
// print_r($_POST);

$mysqli = require __DIR__ ."/database.php";

$sql = "INSERT INTO user(name, email, password_hash) VALUES(?, ?, ?)";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if($stmt->execute()){
    // echo "Signup Successful";
    header("Location: signup_success.html");
    exit;
}else{
    die($mysqli->error);
}
?>