<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">


 <form id="org_create" method="post" accept-charset="utf-8" action="<?php echo site_url('organizations/view') ?>">
        <table width="300" border="0" align="center" cellpadding="2" cellspacing="2" class="roundedTable">
        	<tr>
                <td colspan="2" align="center"><h2>Create an Organization</h2></td>
            </tr>
            
            <tr>
                <td width="105" style="text-align: right"> <label for="name">Name</label></td>
                <td width="181" style="text-align: center"><input type="text" name="name" id="input_createoname"/></td>
            </tr>
            <tr>
                <td style="text-align: right"> <label for="code">Code</label></td>
                <td style="text-align: center"><input type="text" name="code" id="input_createocode"/></td>
            </tr>
            <tr>
                <td height="42" colspan="2" align="center" valign="middle">
                  <!-- CHOOSE ROLE -->
            <!-- <select id="input_createodept" name="role">
                <option value=0>--Select Department--</option>
                <?php foreach($roles as $r) {
                    echo '<option value='.$r->roleid.'>'.$r->rolename.'</option>';
                } ?>
            </select> <br/> -->
                 <input type="submit" id="user_createbutton" name="create" value="Create" />
                </td>
            </tr>
        </table>
        </form>
        

    </td>
    <td></td>
  </table>

	
</div>