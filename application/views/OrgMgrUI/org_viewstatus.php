<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
    <h2><?php echo $title.' - '.$curr_org['orgname']?></h2>
	</td>
	</tr>
	<tr align="center">
		<td></td>
		<td align="center">
		
		<?php 
		if ($curr_org['status'] == 0) {
			echo '<h3>CURRENT ORGANIZATION STATUS NOT RECOGNIZED</h2>';
		} else {
			echo '<h3>CURRENT ORGANIZATION STATUS RECOGNIZED</h2>';
		}

		?>	
		<!-- <h3>CURRENT ORGANIZATION STATUS - <?php echo $curr_org['status']?></h2> -->
		</td>
	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	
	<?php foreach ($documents as $d) {
		echo $d->reqname.'</br>';
		if ($d->status == 0) {
			echo 'NOT APPROVED';
		} else {
			echo 'APPROVED';
		}
		echo $d->status.'</br>';
		echo $d->link.'</br>';
		echo $d->sub_date.'</br></br>';
	} ?>

	<!--
	<?php foreach ($requirements as $r) { ?>
		<tr align="center">
		<td align="right"><?php if($status=='Not Recognized') echo anchor('requirements/update_reqstatus/', 'Approve'); else echo anchor('requirements/update_reqstatus/', 'Reject')?></td>
		<td align="left">
			<?php echo $r->reqname?>
		</td>
	  </tr>
	<?php } ?> -->
   	
   	</table>

    </td>
    <td></td>
</tr>
  </table>

	
</div>