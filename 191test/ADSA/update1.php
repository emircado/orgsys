<?php session_start(); ?>

<html>
<head>
<title></title>
</head>

<body>

<?php
$orgnum = $_SESSION['oid'];

$con=mysqli_connect("localhost","root", "", "191test");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con,"UPDATE orgs SET status=1 WHERE oid='".$orgnum."'");

mysqli_close($con);

header("Location: setstatus.php"); 
exit; 

?>


</body>
</html>