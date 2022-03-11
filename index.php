<?php
session_start();
require "./config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$id = $_SESSION['id'];

$query = "SELECT * FROM users WHERE id = '$id' ";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lumintu Deepface</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Lumintu Deepface</h1>
                <a href="index.php"><i class="fas fa-home"></i>Home</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                <a  href="upload.php" style="text-decoration: none; color:aliceblue;" role="button" id="button"><i class="fas fa-camera"></i>Camera</a>
                <a  href="absensi.php" style="text-decoration: none; color:aliceblue;" role="button" id="button"><i class="fas fa-robot"></i>Deepface</a>
                
			</div>
		</nav>
		<div class="content">
        <h2>Your Profile</h2>
<div>
    <p>Your account details are below:</p>
    <table>
        <tr>
            <td>Username:</td>
            <td><?=$row['username'] ?></td>
        </tr>
        <tr>
            <td>Password_Bcrypt:</td>
            <td><?=$row['password'] ?></td>
        </tr>
    </table>
</div>
	</body>
</html>