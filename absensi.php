<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
?>

<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Lumintu Deepface</h1>
                <a href="index.php"><i class="fas fa-home"></i>Home</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                <a href="upload.php" style="text-decoration: none; color:aliceblue;" role="button" id="button"><i class="fas fa-camera"></i>Camera</a>
                <a  href="absensi.php" style="text-decoration: none; color:aliceblue;" role="button" id="button"><i class="fas fa-robot"></i>Deepface</a>         
			</div>
		</nav>
		<div class="content">
   <br><br>
   <form method="POST" action="tempImage.php">
       <div class="row">
           <div class="col-md-6">
               <div id="my_camera"></div>
               <br/>
               <input type=button value="Take Snapshot" onClick="take_snapshot()">
               <input type="hidden" name="image" class="image-tag">
           </div>
           <div class="col-md-6">
               <div id="results">Your captured image will appear here...</div>
           </div>
           <div class="col-md-12 text-center">
               <br/>
               <button class="btn btn-success" name="check">Submit</button>
           </div>
       </div>
       
   </form>
</div>
 
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
   Webcam.set({
       width: 490,
       height: 390,
       image_format: 'jpeg',
       jpeg_quality: 90
   });
 
   Webcam.attach( '#my_camera' );
 
   function take_snapshot() {
       Webcam.snap( function(data_uri) {
           $(".image-tag").val(data_uri);
           document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
       } );
   }
</script>
</body>
</html>