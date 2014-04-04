<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        	<a href = "<?php echo site_url('users/create') ?>"><h2>Create a User Account</h2></a><br/>

    <table width="70%" border="0" align="center" cellpadding="20" cellspacing="0">
	<?php
		foreach ($users as $u) {
			echo '
      <tr>
        <td rowspan="2" align="right" valign="top"><strong>'.$roles[$u->roleid].'</strong></td>
        <td align="left" valign="bottom">Username : '.$u->username.'</td>
      </tr>
      <tr>
        <td align="left" valign="top">Name : '.$u->name.'</td>
      </tr>'		;
		}
	?>
   </table>

   
    </td>
    <td></td>
  </table>

	
</div>