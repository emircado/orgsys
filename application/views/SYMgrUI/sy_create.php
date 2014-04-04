<div>

<table width="70%" border="0" align="center" cellpadding="15" cellspacing="0" class="roundedTable">
  <tr>
    <td></td>
    
    <td>
		
        	<form id="sy_create" method="post" accept-charset="utf-8" action="<?php echo site_url('schoolyears') ?>" >
		<h2>CREATE SCHOOLYEAR HERE</h2>

		<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>
            
            <div class="error" id="sy_createerror"></div>
            <select id="chooseyear" name="year1">
                <option value="----">--Select Year--</option>
                <?php foreach ($schoolyears as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                } ?>
            </select>&nbsp;<div id="year2disp"></div>
            
            </td>
          </tr>
        </table>

		<br />
		<br />
		<br />

		<h2>DEPARTMENTS</h2>
        
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>
            
            <div style="font-size:18px">Guidelines:</div>
        <ol>
		<li>A unit head account will automatically be created for every department created.</li><br/>
		<li>The unit head's username depends on the schoolyear and department code.</li><br/>
		<li>School years in the system are unique. See the list of schoolyears for the list of created ones.</li><br/>
        </ol>
		
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
            
            </td>
          </tr>
        </table>
        
		

    </td>
    <td></td>
    
    </td>
  </table>

	
</div>