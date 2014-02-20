<div>
	Users: <br/>
	<?php
		foreach ($users as $u) {
			echo $u->username.'<br/>'
				.$u->name.'<br/>'
				.$roles[$u->roleid].'<br/>';
		}
	?>
</div>