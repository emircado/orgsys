<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr align="center">
    <td></td>
    <td align="center">
            	<?php
		echo validation_errors();
		echo ' <h2>Create Requirements</h2>';
		echo form_open('requirements/submit_req');
		
		
		echo '<table width="70%" border="0" align="center" cellpadding="20" cellspacing="0">';
		for($i = 0; $i < count($reqlist); $i++) {
			echo '<tr><td rowspan="2" align="right" valign="top">'.($i+1).'</td>';
			echo '<td align="left" valign="bottom">'.form_label('Requirement : ', 'req').'<br>';
			$data = array(
              'name'        => 'req['.$i.']',
              'value'       => $reqlist[$i]->reqname,
              'size'        => '60',
            );
			echo form_input($data).'</td></tr><tr>';
			echo '<td align="left" valign="bottom">'.form_label('Description : ', 'desc')."<br>";
			$data = array(
              'name'        => 'desc['.$i.']',
              'value'       => $reqlist[$i]->description,
              'size'        => '60',
            );
			echo form_input($data).'</td></tr>';
		}
		$i;
		echo '</table>';
		/*for($i = count($reqlist); $i < 10; $i++) {
			echo ($i+1).'</br>';
			echo form_label('Requirements', 'req');
			$data = array(
              'name'        => 'req['.$i.']',
              'size'        => '56',
            );
			echo form_input($data).'<br/>';
			echo form_label('Description:', 'desc');
			$data = array(
              'name'        => 'desc['.$i.']',
              'size'        => '71',
            );
			echo form_input($data).'<br/>'.'<br/>';
		}*/
		echo form_submit('create', 'Create').form_close();
		echo '<pre>'.print_r($this->input->post(),TRUE).'</pre>';
	?>
	<script>
	var whatever = "<?= $i ?>";
	</script>
	<button id="add">Add extra field</button>

    </td>
    <td></td>
  </table>

	
</div>