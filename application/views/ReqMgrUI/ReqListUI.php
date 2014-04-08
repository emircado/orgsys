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
						echo 'No final requirements yet for '.$schoolyear->schoolyear;
					} else {
						echo '<h3>For the schoolyear '.$schoolyear->schoolyear.
							'<br>by '.$reqlist[0]->createdby.'</h3>'.
							'<br><br/><strong><h3>What needs to be submitted?</h3></strong>';
						for($i = 0; $i < count($reqlist); $i++) {
							echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($i+1).'. '.$reqlist[$i]->reqname;
						}
		
						// DETAILS PER REQUIREMENT
						echo '<br><br><br><strong><h3>Details Per Requirement</h3></strong>';
						foreach($reqlist as $req) {
							
							echo '<strong>'.$req->reqname.'</strong>';
							foreach (explode("||", $req->description) as $desc)
								echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$desc;
							echo "<br><br>";
		
						}
					}
				}
			?>
        
        </td>
      </tr>
    </table>

</div>