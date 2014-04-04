<div align="center">
	<br><br /><br />
	<!-- LOG IN FOR USERS -->
	<div>
		
		<div class="error" id="user_loginerror"></div>
 	    <form id="user_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main') ?>" >
        <table width="300" border="0" align="center" cellpadding="2" cellspacing="2" class="roundedTable">
        	<tr>
                <td colspan="2" align="center"><h2>User Log In</h2></td>
            </tr>
            
            <tr>
                <td width="105" style="text-align: right"><label for="username">Username</label></td>
                <td width="181" style="text-align: center"><input type="text" name="username" id="input_username"/></td>
            </tr>
            <tr>
                <td style="text-align: right"><label for="password">Password</label></td>
                <td style="text-align: center"><input type="password" name="password" id="input_password"/></td>
            </tr>
            <tr>
                <td height="42" colspan="2" align="center" valign="middle"><input type="submit" id="user_loginbutton" name="login" value="Log In" /></td>
            </tr>
        </table>
        </form>
        
	</div>

	<br><br /><br />

	<!-- SEE ORG RECOG STATUS -->
	<div align="center">
    
    <form id="org_login" method="post" accept-charset="utf-8" action="<?php echo site_url('main') ?>">
    <table width="300" border="0" align="center" cellpadding="2" cellspacing="2" class="roundedTable">
        	<tr>
                <td colspan="2" align="center"><h2>See your org's recognition status here</h2></td>
            </tr>
            
            <tr><div class="error" id="org_loginerror"></div></tr>
            
            <tr>
                <td width="89" style="text-align: right"><label for="key">Key</label></td>
                <td width="197" style="text-align: center"><input type="password" name="key" id="input_key"/></td>
            </tr>
            <tr>
                <td height="48" colspan="2" align="center" valign="middle"><input type="submit" id="org_loginbutton" name="passkey" value="Go" /></td>
            </tr>
        </table>
   	</form>
    
	</div>
<div>	