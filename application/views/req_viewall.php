<div>
	VIEW REQUIREMENTS <br/>

	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('main') ?>">Create Requirements Checklist</a><br/>
		<a href = "<?php echo site_url('main') ?>">Edit Requirements Checklist</a><br/>
	<?php } ?>

	<?php 
		if ($schoolyear == NULL) {
			echo '<br/>No active schoolyear.';
		} else {
			if (count($reqlist) == 0) {
				echo 'No final requirements yet for '.$schoolyear->schoolyear;
			} else {
				echo '<br/>For the schoolyear '.$schoolyear->schoolyear.
					'<br/>by '.$reqlist[0]->createdby.
					'<br/><br/>What needs to be submitted?';
				for($i = 0; $i < count($reqlist); $i++) {
					echo '<br/>'.($i+1).'. '.$reqlist[$i]->reqname;
				}

				if (!$value) {
					// DETAILS PER REQUIREMENT
					foreach($reqlist as $req) {
						
						echo '<br/><br/>'.$req->reqname;
						echo '<br/>'.$req->description;

					}
					
				}
			}
		}
	?>

</div>