<?php 
					//hostname, username, password, databasename
	$db = new mysqli('localhost', 'root', '', 'carolina_spa');

	if($db->connect_error) {
		$error = $db->connect_error;
	}

 ?>