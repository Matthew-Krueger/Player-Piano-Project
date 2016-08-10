<?php
$p = getenv('DOCUMENT_ROOT');
session_start();
##require_once '/pass.php';

#require the config array
require_once $p . '/func/config.php';

# Set Autoload of files
spl_autoload_register(function($class){
	require_once $p . '/html/func/classes/' . $class . '.php';
});

#Require Sanitation file
require_once Config::Get('root') . '/html/func/san.php';


if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	# User asked to be remembered

	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance(Config::get('mysql/db/userData/name'))
		->get(Config::get('mysql/db/userData/session'),
		array('hash', '=', $hash));

	if ($hashCheck->count()) {
		# hash matches, log user in
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}

}
