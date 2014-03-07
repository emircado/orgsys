<div>

	<?php if ($schoolyear != NULL) { ?>
	Create an organization for AY<?php echo $schoolyear->schoolyear ?>

	<div class="error" id="org_createerror"></div>
	<form id="org_create" method="post" accept-charset="utf-8" action="<?php echo site_url('organizations') ?>">
		<label for="name">Name</label>
			<input type="text" name="name" id="input_createoname"/><br/>
		<label for="code">Code</label>
			<input type="text" name="code" id="input_createocode"/><br/>

		<!-- CHOOSE DEPARTMENT IF ASSOC DEAN-->
		<select id="input_createodept" name="unithead">
			<option value=-1>--Select Department--</option>
			<?php foreach($departments as $d) {
				echo '<option value='.$d->unithead.'>'.$d->deptname.'</option>';
			} ?>
		</select> <br/>

		<!-- UPLOAD DOCUMENTS -->
		Upload the organization's documents here <br/>
		
		<input type="submit" id="org_createbutton" name="create" value="Create" />
	</form>

	<?php } else {
		echo 'There is no active schoolyear.';
	}?>
</div>