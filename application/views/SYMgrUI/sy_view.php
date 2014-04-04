 <br/>



<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        <h2>School Year View</h2>
            <a href="<?php echo site_url('schoolyears/create') ?>"><h3>Create School Year</h3></a> <br/>
		<table width="50%" border="0" align="center" cellpadding="5" cellspacing="5">
		<?php
            foreach($schoolyears as $sy) {
                echo '<tr><td align="right" width="40%"><strong>SY ID : </strong></td><td>'.$sy->syid.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>Name : </strong></td><td>'.$sy->name.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>Status : </strong></td><td>'.$sy->status.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>ReqStatus : </strong></td><td>'.$sy->reqstatus.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>Deadline1  : </strong></td><td>'.$sy->deadline1.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>Deadline2 : </strong></td><td>'.$sy->deadline2.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>Start Date : </strong></td><td>'.$sy->startdate.'</td></tr>';
                echo '<tr><td align="right" width="40%"><strong>End Date : </strong></td><td>'.$sy->enddate.'</td></tr>';
				echo '<tr><td align="right" width="40%"></td></tr>';
            }
        ?>
        </table>

    </td>
    <td></td>
  </table>

	
</div>