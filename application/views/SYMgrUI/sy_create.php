<div>
	<form id="sy_create" method="post" accept-charset="utf-8" action="<?php echo site_url('schoolyears') ?>" >
		CREATE SCHOOLYEAR HERE <br/>

		<div class="error" id="sy_createerror"></div>

		<select id="chooseyear" name="year1">
			<option value="----">--Select Year--</option>
			<?php foreach ($schoolyears as $key => $value) {
				echo '<option value="'.$key.'">'.$value.'</option>';
			} ?>
		</select>
		<div id="year2disp"></div>

		DEPARTMENTS <br/>
		Guidelines: <br/>
		1. A unit head account will automatically be created for every department created.<br/>
		2. The unit head's username depends on the schoolyear and department code. <br/>
		3. School years in the system are unique. See the list of schoolyears for the list of created ones.<br/>
		
		<label for="deptname[]">Name</label><input type="text" name="deptname[]">
		<label for="deptcode[]">Code</label><input type="text" name="deptcode[]">
		<label for="depthead[]">Head</label><input type="text" name="depthead[]"><br/>

		<label for="deptname[]">Name</label><input type="text" name="deptname[]">
		<label for="deptcode[]">Code</label><input type="text" name="deptcode[]">
		<label for="depthead[]">Head</label><input type="text" name="depthead[]"><br/>

		<label for="deptname[]">Name</label><input type="text" name="deptname[]">
		<label for="deptcode[]">Code</label><input type="text" name="deptcode[]">
		<label for="depthead[]">Head</label><input type="text" name="depthead[]"><br/>

		<div id="adder"></div><button id="add_dept_button">Add Department</button>
			
		<br/><input type="submit" id="sy_createbutton" name="create" value="Create" />		
	</form>
	<a href="<?php echo site_url('schoolyears') ?>">Cancel</a>
</div>