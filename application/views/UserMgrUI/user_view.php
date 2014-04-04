<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        <a href = "<?php echo site_url('users/edit') ?>">
        <h2>Edit Details<br/>
        </h2></a>
        <table width="300" border="0" align="center" cellpadding="15" cellspacing="2">
            <tr>
                <td width="142" align="right"><label for="name">Username :</label></td>
                <td width="144"><?php echo $userinfo->username ?></td>
            </tr>
            <tr>
                <td align="right"><label for="email">Name :</label></td>
                <td><?php echo $userinfo->name ?></td>
            </tr>
             <tr>
                <td align="right"><label for="email">Email :</label></td>
                <td><?php echo $userinfo->email ?></td>
            </tr>
            
        </table>
        <br />
        <br />
        
    </td>
    <td></td>
  </table>

	
</div>