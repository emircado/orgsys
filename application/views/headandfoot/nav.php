<div>
	<a href = "<?php echo site_url('main') ?>">Home</a><br/>
	
	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		SCHOOLYEARS <br/>
		<a href = "<?php echo site_url('main') ?>">Create New Schoolyear</a><br/>
		<a href = "<?php echo site_url('main') ?>">View All Schoolyears</a><br/>
	
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
	
	MY ACCOUNT <br/>
	<a href = "<?php echo site_url('main') ?>">Edit profile</a><br/>
	<a href = "<?php echo site_url('main') ?>">Change Password</a><br/>
</div>