<?php
class Redirect{
	public static function to($location = null)
	{
		if ($location) {
			if (is_numeric($location)) {
				switch ($location) {
					case 404:
						header("HTTP/1.0 404 Not Found");
						require '/home/matthapkidokarate/wwws/func/includes/errors/404user.php';
						exit();
						break;
					
					default:
						# code...
						break;
				}
			}
			echo "<META http-equiv=\"refresh\" content=\"0;URL=" . $location . "\">";
			exit();
		}
	}
}