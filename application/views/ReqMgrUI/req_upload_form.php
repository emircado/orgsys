<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
		
        <h2>Requirements Upload</h2>
            <?php echo $error;?>

			<?php echo form_open_multipart('requirements/do_upload');?>
            
            <input type="file" name="userfile" size="20" />
            
            <br /><br />
            
            <input type="submit" value="Upload" />
            
            </form>

    </td>
    <td></td>
  </table>

	
</div>