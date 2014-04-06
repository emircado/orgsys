<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
    <h2>MODIFY STATUS - <?php echo $name?></h2>
	</td>
	</tr>
	<tr align="center">
		<td></td>
		<td align="center">
			
		<h3>CURRENT ORGANIZATION STATUS - <?php echo $status?></h2>
		</td>
	<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
	<?php
		foreach ($requirements as $r) { ?>
		<tr align="center">
		<td align="right"><?php if($status=='Not Recognized') echo anchor('requirements/update_reqstatus/', 'Approve'); else echo anchor('requirements/update_reqstatus/', 'Reject')?></td>
		<td align="left">
			<?php echo $r->reqname?>
		</td>
	  </tr>
		<?php } ?>
   	</table>

    </td>
    <td></td>
</tr>
  </table>

	
</div>