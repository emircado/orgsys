<div>
	<?php
		echo validation_errors();
		echo 'Create User';
		echo form_open('users/submit_user');
		echo form_label('Name', 'name').form_input('name').'<br/>';
		echo form_label('Username', 'username').form_input('username').'<br/>';
		foreach ($roles as $r) {
			echo form_label("$r->rolename", 'role[]').form_radio('role[]', $r->roleid).'<br/>';
		}
		echo form_submit('create', 'Create').form_close();
	?>
</div>