<div>
	<!-- LOG IN FOR USERS -->
	<div>
		User Log In
		<div class="error" id="user_loginerror"></div>
		<form id="user_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main/login') ?>" >
			<label for="username">Username</label>
				<input type="text" name="username" id="input_username"/><br/>
			<label for="password">Password</label>
				<input type="password" name="password" id="input_password"/><br/>
			<input type="submit" class="logbutton" id="user_loginbutton" name="login" value="Log In" />
		</form>
	</div>

	<!-- SEE ORG RECOG STATUS -->
	<div>
		See your org's recognition status here
		<div class="error" id="org_loginerror"></div>
		<form id="org_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main') ?>">
			<label for="key">Key</label>
				<input type="password" name="key" id="input_key"/><br/>
			<input type="submit" class="logbutton" id="org_loginbutton" name="passkey" value="Go" />
		</form>
	</div>
<div>	