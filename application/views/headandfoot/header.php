<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'ORgSys - '.$title ?></title>
</head>
<body>
	<h1><a href="<?php echo base_url(); ?>">ORgSys</a></h1>
	<!-- NAVIGATION -->
	<div>
		<a href="<?php echo site_url("requirements"); ?>">Requirements</a>
		<?php 
			if (isset($username)) {
				echo 'Welcome '.$username.' '.$user_role;
				echo '<a href="'.site_url("main/logout").'">Log Out</a>';
			}
		?>
	</div>
