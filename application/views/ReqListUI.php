<div>
	<br/>
		Guidelines on Renewal of Recognition of All UP COE-Based Organizations
	<?php 
		if (count($schoolyear) == 0) {
			echo '<br/>No active schoolyear.';
		} else {
			if (count($reqlist) == 0) {
				echo 'No final requirements yet for '.$schoolyear[0]->schoolyear;
			} else {
				echo '<br/>For the schoolyear '.$schoolyear[0]->schoolyear.
					'<br/>by '.$reqlist[0]->createdby.
					'<br/><br/>What needs to be submitted?';
				for($i = 0; $i < count($reqlist); $i++) {
					echo '<br/>'.($i+1).'. '.$reqlist[$i]->reqname;
				}

				// DETAILS PER REQUIREMENT
				foreach($reqlist as $req) {
					
					echo '<br/><br/>'.$req->reqname;
					echo '<br/>'.$req->description;

				}
			}
		}
	?>

</div>