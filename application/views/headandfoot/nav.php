<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td>
    
        
    <div style="font-size:20px" align="left"><strong>MANAGEMENT</strong></div>
    <a href = "<?php echo site_url('main') ?>">
    Home</a> || 
	
	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('schoolyears') ?>">Manage School Years</a> || <a href = "<?php echo site_url('users') ?>">Manage User Accounts</a> || 
	<?php } ?>

	<a href = "<?php echo site_url('organizations') ?>">Manage Organizations</a> || <a href = "<?php echo site_url('users/myaccount') ?>">My Account</a><br />
	<br/>
<strong><div style="font-size:20px" align="left">REQUIREMENTS</div>
</strong>
	<a href = "<?php echo site_url('main') ?>">View Requirements Checklist</a> 
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		|| <a href = "<?php echo site_url('requirements/createreq') ?>">Create Requirements Checklist</a> || 
		<a href = "<?php echo site_url('requirements/') ?>">Edit Requirements Checklist</a> ||
		<a href = "<?php echo site_url('requirements/upload_req') ?>">Upload Requirements</a>
		<?php } ?>		
    </td>
    <td></td>
  </table>
<br />
<br />

	
</div>