<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">

        <h2>Requirements Upload - <?php echo $orgname?></h2>
	</td></tr>
 </table></br></br>
 <table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <?php echo form_open_multipart('requirements/do_upload/'.$orgname);?>
  <tr align="center">
	<td>
        <?php 
			echo $error;?>
	</td>
  </tr>
			<?php
			$i = 1;
			foreach($requirements as $r){
			?>
			<tr align="left">
				<td><?php echo form_label($r->reqname.' : ', 'file['.$i.']');?></td>
				         <td> <?php echo form_upload($i); ?></td>
				<?php $i = $i+1;	?>
			</tr>
			<?php }?>
	</table>
	<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0">
            <br /><br />
    <tr align="center"><td>
            <input type="submit" value="Upload" />
    </td></tr>
    
  </form>
  </table>

	
</div>