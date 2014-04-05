<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">

        <h2>Requirements Upload</h2>
            <?php echo $error;?>

			<?php echo form_open_multipart('requirements/do_upload');?>
            <?php echo form_label('File 1: ', 'file1') ?>
            <?php echo form_upload('file1') ?>
            <?php echo form_label('File 2: ', 'file2') ?>
            <?php echo form_upload('file2') ?>
            <br /><br />
            
            <input type="submit" value="Upload" />
            
            </form>

    </td>
    <td></td>
  </table>

	
</div>