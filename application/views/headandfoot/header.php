<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'ORgSys - '.$title ?></title>

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('semantic/packaged/css/semantic.css') ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('codecss/CSS.css') ?>">

	<!-- <script src="<?php echo base_url('semantic/packaged/javascript/semantic.js')?>"></script> -->


</head>
<body>
	<h1><a href="<?php echo base_url(); ?>">ORgSys</a></h1>
	<!-- NAVIGATION -->
	<div>
		<a href="<?php echo site_url("requirements"); ?>">Requirements</a>
		<?php 
			if (isset($curr_user['username'])) {
				echo 'Welcome '.$curr_user['username'].' '.$curr_user['user_role'];
				echo '<a href="'.site_url("main/logout").'">Log Out</a>';
			}
		?>
	</div>
