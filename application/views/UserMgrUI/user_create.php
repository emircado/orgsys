<div>
	Create User
	<div class="error" id="user_createerror"></div>
	<?php echo validation_errors() ?>
	<form id="user_create" method="post" accept-charset="utf-8" action="<?php echo site_url('users/view') ?>">
		<label for="name">Name</label>
			<input type="text" name="name" id="input_createname"/><br/>
		<label for="username">Username</label>
			<input type="text" name="username" id="input_createusername"/><br/>

		<!-- CHOOSE ROLE -->
		<select id="input_createrole" name="role">
			<option value=0>--Select Role--</option>
			<?php foreach($roles as $r) {
				echo '<option value='.$r->roleid.'>'.$r->rolename.'</option>';
			} ?>
		</select> <br/>

		<input type="submit" class="createbutton" id="user_createbutton" name="create" value="Create" />
	</form>
</div>