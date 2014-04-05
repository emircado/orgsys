<div>

<table width="70%" border="0" align="center" cellpadding="30" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="left" width="70%">
		<div align="center">
        <strong><h2>View Requirements</h2></strong>
            	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('requirements/createreq') ?>">Create/Edit Requirements Checklist</a><br/>
		<a href = "<?php echo site_url('requirements/upload_req') ?>">Upload Requirements</a><br/>
	<?php } ?>
		</div><br /><br />

			<?php 
				if (count($schoolyear) == 0) {
					echo '<br/>No active schoolyear.';
				} else {
					if (count($reqlist) == 0) {
						echo 'No final requirements yet for '.$schoolyear->schoolyear;
					} else {
						echo '<h3>For the schoolyear '.$schoolyear->schoolyear.
							'<br>by '.$reqlist[0]->createdby.'</h3>'.
							'<br><br/><h3><strong>What needs to be submitted?</strong></h3>';
						for($i = 0; $i < count($reqlist); $i++) {
							echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($i+1).'. '.$reqlist[$i]->reqname;
						}
		
						// DETAILS PER REQUIREMENT
						echo '<br><br><br><strong><h3>Details Per Requirement</h3></strong>';
						foreach($reqlist as $req) {
							
							echo '<strong>'.$req->reqname.'</strong>';
							echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$req->description."<br><br>";
		
						}
					}
				}
			?>
			<br />

    </td>
    <td></td>
  </table>

	
</div>