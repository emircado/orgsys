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
			$status;
			if($org->status==1)
				$status = 'Not Recognized';
			else
				$status = 'Recognized';
			?><tr><td align="right"><strong>Name : </strong></td><td><?php echo anchor('organizations/org_status/'.$org->name.'/'.$org->status, $org->name);?> </td></tr></br><?php
			echo '<tr><td align="right"><strong>Code : </strong></td><td>'.$org->code.'</td></tr>';
			echo '<tr><td align="right"><strong>Key : </strong></td><td>'.$org->viewkey.'</td></tr>';
			?><tr><td align="right"><strong>Status : </strong></td><td><?php echo $status?></td></tr><?php
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