<?php
$GLOBALS['config'] = array(
	'mysql'		=> array(
				'host'		=> 'localhost',
				'username'	=> 'root',
				'password'	=>  PASS,
        'db'        => array(
          'pageData' => array(
            'location'  => 'locationsMap',
            'data'      => 'pageData',
            'name'      => 'page_data'
          ),
					'userData'	=> array(
						'users'		=> 'users',
						'session'	=> 'users_session',
						'groups'	=> 'groups',
						'name'		=> 'users',
						'que'			=> 'que'
					)
        ),
				/* @Depreciated */
				'table'		=>  array(
					'users'		=> 'users',
					'session'	=> 'users_session',
					'groups'	=> 'groups',
					'logs'		=> array(
						'log'		=> 'rec'
					)
				),
				/* @Depreciated */
				'utable'	=> 'users'
			),
	'remember'	=> array(
				'cookie_name'	=> 'session_id_storage',
				'cookie_expiry'	=>  604800
			),
	'session'	=> array(
				'session_name'	=> 'user',
				'CSRF_protect' 	=> 'token'
			),
	'siteData'	=> array(
				'name' => 'Northeastern 4-H Neighbors',
				'version' => '0.0.1a'
	)
);
