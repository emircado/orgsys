<div>
	<a href = "<?php echo site_url('main') ?>">Home</a><br/>
	
	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('schoolyears') ?>">Manage School Years</a> <br/>

		USER ACCOUNTS <br/>
		<a href = "<?php echo site_url('users') ?>">View User Accounts</a><br/>
		<a href = "<?php echo site_url('users/create') ?>">Create a User Account</a><br/>
	<?php } ?>

	ORGANIZATIONS <br/>
	<a href = "<?php echo site_url('main') ?>">View Organizations</a><br/>
		
	<?php if ('Associate Dean' == $curr_user['user_role']
		|| 'Unit Head' == $curr_user['user_role']) { ?>

		<a href = "<?php echo site_url('main') ?>">Create an Org Account</a><br/>
	<?php } ?>

	REQUIREMENTS <br/>
	<a href = "<?php echo site_url('main') ?>">View Requirements Checklist</a><br/>
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('main') ?>">Create Requirements Checklist</a><br/>
		<a href = "<?php echo site_url('main') ?>">Edit Requirements Checklist</a><br/>
	<?php } ?>
	
	<a href = "<?php echo site_url('users/myaccount') ?>">MY ACCOUNT</a><br/>
	
</div>