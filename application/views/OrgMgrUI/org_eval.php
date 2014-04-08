<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
    <h2><?php echo $org->orgname?></h2>
	</td>
	</tr>
	<tr align="center">
		<td></td>
		<td align="center">
			
		<?php 
			if ($org->status == 0) {
				echo '<h3>CURRENT ORGANIZATION STATUS - NOT RECOGNIZED</h3>';
			} else {
				echo '<h3>CURRENT ORGANIZATION STATUS - RECOGNIZED</h3>';
			}
		?>
		
		<a href = "<?php echo site_url('organizations/update_recog/'.$org->orgcode.'/'.$org->status) ?>">Approve/Disapprove Org</a>

		</td>
	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	<?php
		foreach ($documents as $d) { ?>
		<tr align="center">
		<td align="right">
			<?php if($d->status=='0') { ?>
				<a href = "<?php echo site_url('organizations/update_document/'.$org->orgcode.'/'.$d->reqid.'/'.$d->status) ?>">Approve</a>
			<?php } else { ?>
				<a href = "<?php echo site_url('organizations/update_document/'.$org->orgcode.'/'.$d->reqid.'/'.$d->status) ?>">Reject</a>
				<!-- echo anchor('requirements/update_reqstatus/', 'Approve'); else echo anchor('requirements/update_reqstatus/', 'Reject')?></td> -->
			<?php } ?>
		<td align="left">
			<?php echo $d->reqname?>
		</td>
	  </tr>
		<?php } ?>
   	</table>

    </td>
    <td></td>
</tr>
  </table>

	
</div>