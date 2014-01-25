<div>
	<div>
	<!-- LOG IN FOR USERS -->
		<?php
			echo validation_errors();
			echo 'User Log In:';
			echo form_open('main/login');
			echo form_label('Username', 'username').form_input('username').'<br/>';
			echo form_label('Password', 'password').form_password('password').'<br/>';
			echo form_submit('login', 'Log In');
			echo form_close();
		?>
	</div>

	<!-- SEE ORG RECOG STATUS -->
	<div>
		<?php
			echo 'See your org\'s recognition status here';
			echo form_open('main');
			echo form_label('Key', 'key').form_password('key').'<br/>';
			echo form_submit('passkey', 'Go');
			echo form_close();
		?>
	</div>
<div>	