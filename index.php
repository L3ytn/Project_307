<?php 
	require_once "App/Server/ViewManager/index.phtml";

	if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || preg_match('~Trident/7.0(; Touch)?; rv:11.0~', $_SERVER['HTTP_USER_AGENT'])) {
		echo "<h1>This website does not support Internet Explorer. It's time to move on and install a newer browser.</h1>";
		echo "<p><a href=\"https://www.google.com/chrome/\">Get Google Chrome</a></p>";
		echo "<p><a href=\"https://www.mozilla.org/firefox/new/\">Get Mozilla Firefox</a></p>";
		die;
	}

?>