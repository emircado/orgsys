<div>
	<a href = "<?php echo site_url('main') ?>">Home</a><br/><br/>
	
	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('schoolyears') ?>">Manage School Years</a> <br/>
		<a href = "<?php echo site_url('users') ?>">Manage User Accounts</a><br/>
	<?php } ?>

	<a href = "<?php echo site_url('organizations') ?>">Manage Organizations</a><br/>
	<a href = "<?php echo site_url('requirements/view') ?>">Manage Requirements</a><br/>
	<a href = "<?php echo site_url('users/myaccount') ?>">My Account</a><br/>
	
</div>
<br/>