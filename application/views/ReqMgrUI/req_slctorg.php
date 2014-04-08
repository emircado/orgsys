<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
        <h2>Upload Requirements of Organizations</h2>
    
        <!-- SIDEBAR -->
      <?php if ('Associate Dean' == $curr_user['user_role']) { ?>
        <a href = "<?php echo site_url('requirements/createreq') ?>">Create/Edit Requirements Checklist</a><br/>
        <a href = "<?php echo site_url('requirements/select_org') ?>">Upload Requirements</a><br/>
      <?php } ?>
      
    </td>
  </tr>
   </table></br>
 <table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">

  <?php foreach($organizations as $o){?>
  <tr align="center">
  <td>
			<?php $id = $o->name; 
			echo anchor('requirements/upload_req/'.$id, $o->name); }'</br>'?>
  </td>
  </td>
  </table>
</div>