<div>


</div>

<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        <h2>Guidelines on Renewal of Recognition of All UP COE-Based Organizations</h2>		
	<?php 
		if (count($schoolyear) == 0) {
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

    </td>
    <td></td>
  </table>

	
</div>