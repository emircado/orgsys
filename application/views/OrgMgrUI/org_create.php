<div>
	Create an organization

	<form id="org_create" method="post" accept-charset="utf-8" action="<?php echo site_url('organizations') ?>">
		<label for="name">Name</label>
			<input type="text" name="name" id="input_createoname"/><br/>
		<label for="code">Code</label>
			<input type="text" name="code" id="input_createocode"/><br/>

		<input type="submit" id="user_createbutton" name="create" value="Create" />
	</form>
</div>