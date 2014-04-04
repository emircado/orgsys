<?php session_start(); ?>

<html>
<head>
<title></title>
</head>

<body>

<?php
$orgnum = $_SESSION['oid'];
$x= $_GET['status'];
$y= $_GET['rid'];



$con=mysqli_connect("localhost","root", "", "191test");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($con, "UPDATE submissions SET status=".$x." WHERE (oid=".$orgnum." AND rid=".$y.")");


mysqli_close($con);

header("Location: eval.php"); 
exit; 

?>


</body>
</html>