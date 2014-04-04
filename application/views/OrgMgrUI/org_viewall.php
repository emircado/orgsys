<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
    <h2>ORGANIZATION LIST</h2>
	<a href = "<?php echo site_url('organizations/create') ?>"><h3>Create an Organization Account</h3></a>

	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	<?php
		foreach ($organizations as $org) {
			echo '<tr><td align="right" width="40%"><strong>Name : </strong></td><td>'.$org->name.'</td></tr>';
			echo '<tr><td align="right"><strong>Code : </strong></td><td>'.$org->code.'</td></tr>';
			echo '<tr><td align="right"><strong>Key : </strong></td><td>'.$org->viewkey.'</td></tr>';
			echo '<tr><td align="right"><strong>Status : </strong></td><td>'.$org->status.'</td></tr>';
			echo '<tr><td align="right"><strong>User ID : </strong></td><td>'.$org->userid.'</td></tr>';
			echo '<tr><td align="right"><strong>SY ID : </strong></td><td>'.$org->syid.'</td></tr>';
			echo '<tr><td align="right" width="40%"></td></tr>';
		}
	?>
   	</table>

    </td>
    <td></td>
  </table>

	
</div>