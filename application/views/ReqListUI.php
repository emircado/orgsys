<div>
	<br/>
    <table width="50%" border="0" align="center" cellpadding="30" cellspacing="0" class="roundedTable">
      <tr>
        <td>
        	<strong><h2>Guidelines on Renewal of Recognition of All UP COE-Based Organizations</h2></strong>
        	<?php 
				if (count($schoolyear) == 0) {
					echo '<br/>No active schoolyear.';
				} else {
					if (count($reqlist) == 0) {
						echo 'No final requirements yet for '.$schoolyear[0]->schoolyear;
					} else {
						echo '<h3>For the schoolyear '.$schoolyear[0]->schoolyear.
							'<br>by '.$reqlist[0]->createdby.'</h3>'.
							'<br><br/><strong>What needs to be submitted?</strong>';
						for($i = 0; $i < count($reqlist); $i++) {
							echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($i+1).'. '.$reqlist[$i]->reqname;
						}
		
						// DETAILS PER REQUIREMENT
						foreach($reqlist as $req) {
							
							echo '<br/><br/><strong>'.$req->reqname.'</strong>';
							echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$req->description;
		
						}
					}
				}
			?>
        
        </td>
      </tr>
    </table>

</div>