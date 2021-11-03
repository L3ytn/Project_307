<?php
	$configuration_file_contents = file_get_contents("config/configuration.json")
	$configuration = json_decode($configuration_file_contents);
	echo $configuration->hostname;


?>