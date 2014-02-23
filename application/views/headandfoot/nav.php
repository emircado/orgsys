<div>
	<a href = "<?php echo site_url('main') ?>">Home</a><br/>
	
	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('schoolyears') ?>">Manage School Years</a> <br/>
		<a href = "<?php echo site_url('users') ?>">Manage User Accounts</a><br/>
	<?php } ?>

	<a href = "<?php echo site_url('organizations') ?>">Manage Organizations</a><br/>
	
	REQUIREMENTS <br/>
	<a href = "<?php echo site_url('main') ?>">View Requirements Checklist</a><br/>
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('main') ?>">Create Requirements Checklist</a><br/>
		<a href = "<?php echo site_url('main') ?>">Edit Requirements Checklist</a><br/>
	<?php } ?>
	
	<a href = "<?php echo site_url('users/myaccount') ?>">My Account</a><br/>
	
</div>