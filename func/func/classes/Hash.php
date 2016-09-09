<?php
class Hash{
	public static function make($string, $salt = '')
	{
		return hash('sha512', $string . $salt);
	}

	public static function salt($length)
	{
		$ent = (int)shell_exec ("cat /proc/sys/kernel/random/entropy_avail");
		if($ent <= 500)
		{
			return mcrypt_create_iv(32,MCRYPT_DEV_URANDOM)/*hash('sha512', $string . $salt)*/;
			# echo "<br>Urandom";
		}else{
			return mcrypt_create_iv(32,MCRYPT_DEV_RANDOM);
			# echo "<br>True random";
		}
	}

	public static function unique()
	{
		return self::make(uniqid());
	}
}