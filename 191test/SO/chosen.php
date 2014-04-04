<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORgSys - Organization Recognition System</title>

<link href="../CSS.css" rel="stylesheet" type="text/css" />
</head>

<?php 
                          
$con=mysqli_connect("localhost","root", "", "191test");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="middle"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="144"><!-- #BeginLibraryItem "/Library/Header.lbi" -->
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
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
              <td width="1034" align="center"><h2><strong>Welcome Student Organization Representative!</strong></h2>
                <br />
                <table width="399" border="0" align="center">
                  <tr>
                    <td width="75" align="right"><img src="../images/zoom.png" width="64" height="64" /></td>
                    <td width="31" align="right"><p>&nbsp;</p></td>
                    <td width="213">Status of Organization Recognition Process</td>
                  </tr>
                  <tr>
                    <td colspan="3" align="center"><p>&nbsp;</p>
                      <?php 
						$x = $_POST["uk"];
						
						//echo $_POST["uk"];
						
                        $result = mysqli_query($con,"SELECT * FROM orgs WHERE orgname='".$x."'");
						
                        $row = mysqli_fetch_array($result);
						
                        if(count($row)==0){
							echo "Invalid key.<br><br><a href='index.php'><img src='../images/left.png'></a>";
						} else if($row['status']==0){
							echo "Currently, ";
                        	echo "<strong>".$row['orgname']."'s</strong> status is:";
                            echo "<strong> NOT RECOGNIZED </strong>";
							echo "<br><img src='../images/close.png'>";
							echo "<p>Your documents are still being evaluated by the Associate Dean of Student Affairs.</p>";														
							
                        } else if ($row['status']==1) {
							echo "Currently, ";
                        	echo "<strong>".$row['orgname']."'s</strong> status is:";
                            echo "<strong> RECOGNIZED </strong>";
							echo "<br><img src='../images/checkmark.png'>";
                        }
						
						if(count($row)!=0){
							
							echo "<br><br><strong>Evaluation Status:</strong>";
							$result3 = mysqli_query($con,"SELECT * FROM requirements");
							echo "<table width='500' border='0' align='center' cellpadding='5' cellspacing='5'>";														
							
							while($row2 = mysqli_fetch_array($result3)){
								$result2 = mysqli_query($con,"SELECT * FROM submissions WHERE (oid=".$row['oid']." AND rid=".$row2['rid'].")");
								$fetched_data = mysqli_fetch_array($result2);
												
								echo "<tr>";								
								echo "<td valign='middle' align='right' width='200'>Currently:<br><strong>";
								if ($fetched_data['status']==2){
									echo "ACCEPTED";
								} else if ($fetched_data['status']==1){
									echo "REJECTED";
								} else if($fetched_data['status']==0) {
									echo "NOT EVALUATED";
								}															
								echo "</strong></td>";
								
								echo "<td valign='middle' width='300'>";
								echo ($row2['rid']+1).". ".$row2['rname']."";
								echo "</td>";
								
								echo "</tr>";							
							}
						}
                    
                    ?>
                      </td>
                  </tr>
                </table>
                <p>&nbsp;</p></td>
              </tr>
    </table>
          <p>&nbsp;</p></td>
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



</body>
</html>
