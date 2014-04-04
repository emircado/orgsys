<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORgSys - Organization Recognition System</title>
<link href="../CSS.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
                          
$con=mysqli_connect("localhost","root", "", "191test");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="middle"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="144"><!-- #BeginLibraryItem "/Library/Header.lbi" --><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                style="margin-left:auto; margin-right:auto;">
                  <tr>
                    <td width="40%"><a href="../index.php"><img src="../images/logo.png" alt="ORgSyS Home" width="302" height="100" border="0" /></a></td>
                    <td width="60%" class="header_links"><a href="../index.php">Home</a> || <a href="../so_list.php">Student Organizations</a> || <a href="../req.php">Requirements</a></td>
                  </tr>
                </table>
<!-- #EndLibraryItem --></td>
          </tr>
        </table></td>
      </tr>
      <tr style="background-image: url(../images/bg1.jpg);
                background-repeat: no-repeat;
                background-size:cover;">
        <td height="20"></td>
      </tr>
      <tr style="background-image: url(../images/upbg2.png); background-repeat:repeat-x;">
        <td height="19"></td>
      </tr>
      <tr>
        <td><table width="900" border="0" align="center">
          <tr>
              <td width="1034" align="center"><h2><strong>Welcome Associate Dean for Student Affairs!</strong></h2>
                <table width="85%" border="0">
                  <tr>
                    <td align="left"><table width="399" border="0" align="center">
                      <tr>
                        <td width="111" align="right"><img src="../images/certificate.png" width="64" height="64" /></td>
                        <td width="5" align="right">&nbsp;</td>
                        <td width="203">Set Recognition Status</td>
                      </tr>
                    </table>
                      <br />
                      <table width="90%" border="0" align="center">
                        <tr>
                          <td align="center">
						  
                              <?php 
                          	$orgnum = $_SESSION['oid'];
							$result = mysqli_query($con,"SELECT * FROM orgs WHERE oid=".$orgnum);
							$row = mysqli_fetch_array($result);
							echo "Currently, ";
                          	echo "<strong>".$row['orgname']."'s</strong> status is:";
							
							if($row['status']==0){
								echo "<strong> NOT RECOGNIZED </strong>";
								
								echo '<table width="399" border="0" align="center">
                              	<tr class="middle_link">
                                <td width="97" height="84" align="right">
								
								<a href="update1.php">
								<img src="../images/help.png" width="64" height="64" />
								</a>
								
								</strong></td>
                                <td width="5" align="right"></td>
                                <td width="217"><p>';
								
								
								echo "<a href='update1.php'>";		
								echo'<strong>Set status to <strong>RECOGNIZED</strong>';
								echo '</a><br />
                                </p></td>
                              </tr>
                            </table>';
								
							} else if ($row['status']==1) {
								echo "<strong> RECOGNIZED </strong>";
								echo "<br><br>";
								echo "<img src='../images/checkmark.png'>";
									
							}
							
							
                          ?></td>
                        </tr>
                      </table>
                      <br />
                      <table width="399" border="0" align="center">
                        <tr class="middle_link">
                          <td width="112" height="84" align="right"><strong>
                            <?php 
								echo "<a href='chosen.php";			
								echo "?oid=".$_SESSION['oid'];			
								echo "'>";
							?>
                            <img src="../images/left.png" width="64" height="64" /></a></strong></td>
                          <td width="5" align="right">&nbsp;</td>
                          <td width="202"><p><strong>
                          
                            <?php 
								echo "<a href='chosen.php";			
								echo "?oid=".$_SESSION['oid'];			
								echo "'>";
							?>
                            Back to Control Panel </a> <br />
                          </strong></p></td>
                        </tr>
                      </table></td>
                  </tr>
                  </table></td>
              </tr>
    </table></td>
      </tr>
      <tr>
        <td height="35" style="background-image: url(../images/bottombg.png);
                background-repeat:repeat-x;"></td>
      </tr>
      <tr>
        <td height="116" bgcolor="#e2e2e2"><!-- #BeginLibraryItem "/Library/footer.lbi" --><table width="900" border="0" align="center">
          <tr valign="top">
            <td width="32%" height="338"><p><strong>Contact Information</strong></p>
              <p class="bottom_text">Melchor Hall, Osmena Ave.,<br />
                University of the Philippines<br />
                Diliman, Quezon City, Philippines 1101 </p>
              <p class="bottom_text"><strong>Office of the Dean</strong><br />
                Telephone: +63 2 920 8860, +63 2 981 8500 loc. 3101-3103, +63 2 928 3144<br />
                Fax: +63 2 920 8860<br />
                Email: upengg@coe.upd.edu.ph</p>
              <p class="bottom_text"><strong>Office of the College Secretary</strong><br />
                Telephone: +63 2 981 8500 loc. 3104, 3120</p>
              <p class="bottom_text"><strong>National Graduate School of Engineering</strong><br />
                Telephone: +63 2 926 0703, +63 2 981 8500 loc. 3105-3106<br />
                Email: ngse@coe.upd.edu.ph</p></td>
            <td width="38%"><p><strong>Quick links</strong></p>
              <p class="bottom_links"><a href="https://mail.up.edu.ph/">UP Webmail</a><br />
                <a href="https://crs.upd.edu.ph/">UP Computerized Registration System</a><br />
                <a href="http://uvle.up.edu.ph/">UP Virtual Learning Environment</a><br />
                <a href="http://ilib.upd.edu.ph/">UP Integrated Library System</a><br />
                <a href="https://mail.up.edu.ph/local/files/aup.html">UP Acceptable Use Policy (AUP) for IT Resources</a><br />
                <a href="http://time.upd.edu.ph/">UP Diliman Official Time</a></p></td>
            <td width="30%"><p><strong>About</strong></p>
              <p>&nbsp;</p></td>
          </tr>
        </table>
        <p align="center">Copyright © 2013. ChicharongFlower. All rights reserved.</p><!-- #EndLibraryItem --></td>
      </tr>
    </table></td>
  </tr>
</table>


<?php 
mysqli_close($con);
?>
</body>
</html>
