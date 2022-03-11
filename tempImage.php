<?php
session_start();
$username = $_SESSION['username'];
if(isset($_POST['image'])){
    $img = $_POST['image'];
    $folderPath = "temporary/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $username . '2.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    $con = mysqli_connect('localhost', 'root', '', 'deepface');
    $sql = "SELECT id FROM users WHERE username ='$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_array($result);
        $id = $data['id'];
        $query = "UPDATE users SET tempName ='$fileName' WHERE id = '$id'";
        if(mysqli_query($con, $query))
        {
            $response = array(
                'status' => true,
                'message' => "Image Saved Successfully."
            );
            header("Location: check.php");
        }
        else
        {
            $response = array(
                'status' => true,
                'message' => "Unable to save image."
            );
        }
    }
    
}
// return the response
header('Content-type: application/json');
echo json_encode($response);
?>