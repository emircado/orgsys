<div>
	<!-- LOG IN FOR USERS -->
	<!-- <form class="ui form segment" id="user_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main') ?>" > -->
	<div class="ui form segment" id="user_login">
	
		<h3 class="ui header">User Login</h3>
		<div class="ui error message" id="user_loginerror"></div>
		<div class="field">
			<div class="ui left labeled icon input">
				<input placeholder="Username" type="text" name="username" id="input_username">
				<i class="user icon"></i>
			</div>
		</div>
		<div class="field">
			<div class="ui left labeled icon input">
				<input placeholder="Password" type="password" name="password" id="input_password">
				<i class="lock icon"></i>
			</div>
		</div>
		<button class="ui green submit button" id="user_loginbutton" name="login">Login</button>
	</div>

	<!-- SEE ORG RECOG STATUS -->
	<form class="ui form segment" id="org_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main') ?>">
		<p>See your org's recognition status here</p>
		<div class="ui error message" id="org_loginerror"></div>
		<div class="field">
			<div class="ui left labeled icon input">
				<input placeholder="Key" type="password" name="key" id="input_key">
				<i class="lock icon"></i>
			</div>
		</div>
		<button class="ui green submit button" id="org_loginbutton" name="passkey">Go</button>
	</form>
</div>	