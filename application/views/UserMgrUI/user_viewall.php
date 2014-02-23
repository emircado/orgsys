<div>
	<a href = "<?php echo site_url('users/create') ?>">Create a User Account</a><br/>

	Users: <br/>
	<?php
		foreach ($users as $u) {
			echo $u->username.'<br/>'
				.$u->name.'<br/>'
				.$roles[$u->roleid].'<br/>';
		}
	?>
</div>