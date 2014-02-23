<div>
	Create an organization

	<form id="org_create" method="post" accept-charset="utf-8" action="<?php echo site_url('organizations/view') ?>">
		<label for="name">Name</label>
			<input type="text" name="name" id="input_createoname"/><br/>
		<label for="code">Code</label>
			<input type="text" name="code" id="input_createocode"/><br/>

		<!-- CHOOSE ROLE -->
		<!-- <select id="input_createodept" name="role">
			<option value=0>--Select Department--</option>
			<?php foreach($roles as $r) {
				echo '<option value='.$r->roleid.'>'.$r->rolename.'</option>';
			} ?>
		</select> <br/> -->

		<input type="submit" id="user_createbutton" name="create" value="Create" />
	</form>
</div>