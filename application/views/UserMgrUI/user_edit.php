<div>
	<a href = "<?php echo site_url('users/edit') ?>">Edit</a><br/>

	<!-- EDIT FORM -->
	<div class="error" id="user_editerror"></div>
	<form id="user_edit" method="post" accept-charset="utf-8" action="<?php echo site_url('users/myaccount') ?>">
		<label for="name">Name</label>
			<input type="text" name="name" id="input_editname" value="<?php echo $userinfo->name ?>"/><br/>
		<label for="email">Email</label>
			<input type="text" name="email" id="input_editemail" value="<?php echo $userinfo->email ?>"/><br/>
		
		Change Password</br>
		<label for="oldpass">Enter old password</label>
			<input type="password" name="oldpass" id="input_editoldpass"/><br/>
		<label for="newpass">Enter new password</label>
			<input type="password" name="newpass" id="input_editnewpass"/><br/>
		<label for="retypepass">Retype new password</label>
			<input type="password" name="retypepass" id="input_editretypepass"/><br/>			

		<input type="submit" id="user_editbutton" name="edit" value="Save" />
	</form>
</div>