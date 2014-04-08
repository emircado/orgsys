<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td>
    
    <div style="font-size:20px">

    <a href = "<?php echo site_url('main') ?>">Home</a> || 
	

    <?php if (isset($curr_user)) { ?>

	<!-- FOR ASSOC DEAN ONLY -->
	<?php if ('Associate Dean' == $curr_user['user_role']) { ?>
		<a href = "<?php echo site_url('schoolyears') ?>">School Years</a> || 
		<a href = "<?php echo site_url('users') ?>">User Accounts</a> || 
	<?php } ?>

	<a href = "<?php echo site_url('requirements/view') ?>">Requirements</a> || 
	<a href = "<?php echo site_url('organizations') ?>">Organizations</a> || 
	<a href = "<?php echo site_url('users/myaccount') ?>">My Account</a><br />
	
	<?php } else if (isset($curr_org)) {?>
		<a href = "<?php echo site_url('main/org_logout') ?>">Logout</a>
	<?php } ?>

	<br/>	
    
	</div>
    </td>
    <td></td>
  </table>
<br />
<br />

	
</div>