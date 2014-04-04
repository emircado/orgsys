<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
	<h2>Edit</h2><br/>

	<!-- EDIT FORM -->
	<div class="error" id="user_editerror"></div>
	<form id="user_edit" method="post" accept-charset="utf-8" action="<?php echo site_url('users/myaccount') ?>">		   
    <table width="300" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="input_editname" value="<?php echo $userinfo->name ?>"/></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email" id="input_editemail" value="<?php echo $userinfo->email ?>"/></td>
            </tr>
            <tr>
            <tr>
              <td colspan="2" align="center"><strong><br />
              Change Password</strong></td>
            </tr>
            
               <td><label for="oldpass">Enter old password</label></td>
               <td><input type="password" name="oldpass" id="input_editoldpass"/></td>
            </tr>
            <tr>
               <td><label for="newpass">Enter new password</label></td>
               <td><input type="password" name="newpass" id="input_editnewpass"/></td>
            </tr>
            <tr>
               <td><label for="retypepass">Retype new password</label></td>
               <td><input type="password" name="retypepass" id="input_editretypepass"/></td>
            </tr>
        </table>
    <br />
    <input type="submit" id="user_editbutton" name="edit" value="Save" />
	</form>

    </td>
    <td></td>
  </table>

	
</div>