<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        	<h2>Create User</h2>
	<div class="error" id="user_createerror"></div>
	<form id="user_create" method="post" accept-charset="utf-8" action="<?php echo site_url('users/view') ?>">
		<table width="300" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="input_createname"/></td>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="input_createusername"/></td>
            </tr>
            <tr>
                <td>Role: </td>
                <td>
                	<!-- CHOOSE ROLES -->
					<select id="input_createrole" name="role">
                        <option value=0>--Select Role--</option>
                        <?php foreach($roles as $r) {
                            echo '<option value='.$r->roleid.'>'.$r->rolename.'</option>';
                        } ?>
                    </select>
      			</td>
            </tr>
        </table>
		<br />

		<input type="submit" id="user_createbutton" name="create" value="Create" />
  </form>

    </td>
    <td></td>
  </table>

	
</div>