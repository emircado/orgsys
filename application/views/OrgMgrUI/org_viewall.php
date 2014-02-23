<div>
	ORG LIST<br/>
	<a href = "<?php echo site_url('organizations/create') ?>">Create an Org Account</a><br/>

	<?php
		foreach ($organizations as $org) {
			echo $org->name.'<br/>';
			echo $org->code.'<br/>';
			echo $org->viewkey.'<br/>';
			echo $org->status.'<br/>';
			echo $org->userid.'<br/>';
			echo $org->syid.'<br/>';
		}
	?>
</div>