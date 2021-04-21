<?php
class utilities
{
	static function trueUser()
	{
		if (isset($_SESSION['idlead'])) {

		} else {
			utilities::redirect('index.php');
		}
	}

	static function redirect($url)
	{
		if (headers_sent()) {
			die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
		} else {
			header('Location: ' . $url);
			die();
		}
	}
}
