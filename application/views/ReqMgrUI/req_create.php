<div>
	<?php
		echo validation_errors();
		echo 'Create Requirements';
		echo form_open('requirements/submit_req');
		for($i = 0; $i < count($reqlist); $i++) {
			echo ($i+1).'</br>';
			echo form_label('Requirements', 'req');
			$data = array(
              'name'        => 'req['.$i.']',
              'value'       => $reqlist[$i]->reqname,
              'size'        => '56',
            );
			echo form_input($data).'<br/>';
			echo form_label('Description:', 'desc');
			$data = array(
              'name'        => 'desc['.$i.']',
              'value'       => $reqlist[$i]->description,
              'size'        => '71',
            );
			echo form_input($data).'<br/>'.'<br/>';
		}
		$i;
		
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
</div>