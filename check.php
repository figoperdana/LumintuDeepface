<?php
session_start();
$username = $_SESSION['username'];
$con = mysqli_connect('localhost', 'root', '', 'deepface');
$sql = "SELECT id, filename, tempName FROM users WHERE username ='$username'";
$result = $con->query($sql);
if ($result->num_rows > 0){
    $data = mysqli_fetch_array($result);
    $id = $data['id'];
    $filename = $data['filename'];
    $tmpname = $data['tempName'];
    $output = shell_exec("python scanning.py $filename $tmpname");
} else{
    echo ("gagal");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
</head>
<body>
    <h1 style="text-align: center;"><?php echo $output; ?></h1>
</body>
</html>