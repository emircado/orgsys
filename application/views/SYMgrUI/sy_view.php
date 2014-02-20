SCHOOL YEAR VIEW <br/>

<a href="<?php echo site_url('schoolyears/create') ?>">Create School Year</a> <br/>

<?php
	foreach($schoolyears as $sy) {
		echo $sy->syid.'<br/>';
		echo $sy->name.'<br/>';
		echo $sy->status.'<br/>';
		echo $sy->reqstatus.'<br/>';
		echo $sy->deadline1.'<br/>';
		echo $sy->deadline2.'<br/>';
		echo $sy->startdate.'<br/>';
		echo $sy->enddate.'<br/>';
	}
?>
