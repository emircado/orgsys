<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'ORgSys - '.$title ?></title>

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('semantic/packaged/css/semantic.css') ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('codecss/CSS.css') ?>">

	<!-- <script src="<?php echo base_url('semantic/packaged/javascript/semantic.js')?>"></script> -->


</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   	<tr>
                <td height="19" bgcolor="#413e4a">
                
                  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="144"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                		style="margin-left:auto; margin-right:auto;">
                        <tr>
                          <td width="40%"><a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url('images/logo.png'); 	?>" alt="ORgSyS Home" width="302" height="100" border="0" /> </a></td>
                          <td width="60%" style="text-align: right; text-decoration: none;color:#FFF;"><a href="<?php echo base_url(); ?>" style="color:#FFF;">	Home</a> || <a href="<?php echo site_url("studentOrganizations"); ?>" style="color:#FFF;">Student Organizations</a> || <a href="<?php echo site_url("requirements"); ?>" style="color:#FFF;">Requirements</a></td>
                        </tr>
                      </table>
                        <div align="right" style="color:#FFF">
                          <?php 
                        if (isset($curr_user['username'])) {
                            echo 'Welcome <strong>'.$curr_user['username'].'</strong> '.$curr_user['user_role'];
                            echo '&nbsp;&nbsp;<a href="'.site_url("main/logout").'" style="color:#FFF"><strong>Log Out</strong></a>';
                        }
                    ?>
                        </div></td>
                    </tr>
                </table>
                
                </td>
             </tr>
             <tr>
                <td height="35" align="center" valign="middle" style="background-image: url(<?php echo base_url('images/bg1.png'); ?>);
                background-repeat: no-repeat;
                background-size:cover;">
                
                <br><br><br>
                <img src="<?php echo base_url('images/open_folder.png'); ?>" width="256" height="256" />
                &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('images/text.png'); ?>" width="546" height="256" />
                <br><br><br>
                
                </td>
                
                
                    
             </tr>
             <tr>
                <td height="19" style="background-image: url(<?php echo base_url('images/upbg2.png'); ?>);
                background-repeat:repeat-x;">&nbsp;
                </td>
             </tr>
        </table>
    
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
    
	<!-- NAVIGATION -->
	
