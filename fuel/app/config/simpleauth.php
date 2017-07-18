<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(

	/**
	 * DB connection, leave null to use default
	 */
	'db_connection' => null,

	/**
	 * DB write connection, leave null to use same value as db_connection
	 */
	'db_write_connection' => null,

	/**
	 * DB table name for the user table
	 */
	'table_name' => 'users',

	/**
	 * Choose which columns are selected, must include: username, password, email, last_login,
	 * login_hash, group & profile_fields
	 */
	'table_columns' => array('*'),

	/**
	 * This will allow you to use the group & acl driver for non-logged in users
	 */
	'guest_login' => true,

	/**
	 * This will allow the same user to be logged in multiple times.
	 *
	 * Note that this is less secure, as session hijacking countermeasures have to
	 * be disabled for this to work!
	 */
	'multiple_logins' => false,

	/**
	 * Remember-me functionality
	 */
	'remember_me' => array(
		/**
		 * Whether or not remember me functionality is enabled
		 */
		'enabled' => false,

		/**
		 * Name of the cookie used to record this functionality
		 */
		'cookie_name' => 'rmcookie',

		/**
		 * Remember me expiration (default: 31 days)
		 */
		'expiration' => 86400 * 31,
	),

	/**
	 * Groups as id => array(name => <string>, roles => <array>)
	 */

	 
	'groups' => array(
      -1 => array('name' => 'Banned', 'roles' => array('banned')),
      0 => array('name' => 'Generic', 'roles' => array('generic')),
      2 => array('name' => 'adminAreaAccess', 'roles' => array('adminareaaccess')),	//SUBSCRIBER
      10 => array('name' => 'Subscriber', 'roles' => array('subscriber','adminareaaccess')),	//SUBSCRIBER
      20 => array('name' => 'Editor', 'roles' => array('editor','subscriber','adminareaaccess')),	//EDITOR
      30 => array('name' => 'Manager', 'roles' => array('manager', 'editor','subscriber','adminareaaccess')),	//MANAGER
      100  => array('name' => 'Admin', 'roles' => array('admin', 'manager', 'editor')),
	),

	'roles' => array(
	 	'banned'     => false,
		'generic'     => false,
		'admin'      => true,
		'adminareaaccess' => array(
			'Controller_Admin' => array('index','dashboard'),
			'Controller_Admin_Users' => array(
				'viewprofile',
			),
		),
		'subscriber' => array(
			'Controller_Admin_Help' => array(
				'menu',
				'index',
			),		
		),
		'editor' => array(
			'Controller_Admin_Users' => array(
				'changepassword',
			),
			'Controller_Admin_Measure' => array(
				'menu',
				'index',
			),
			'Controller_Admin_School' => array(
				'index',
				'menu',
				'edit',
			),
			'Controller_Admin_Student' => array(
				'menu',
				'index',
				'edit',
			),
			'Controller_Admin_Body_Part' => array(
				'menu',
				'index',
				'edit',
			),
			'Controller_Admin_Size' => array(
				'menu',				
				'index',
				'edit',
			),
			'Controller_Admin_Model' => array(
				'menu',
				'index',
				'create',
				'edit',
				'elements',
				'change_detail_status',
				'change_element_status',
				'clone',
			),
			'Controller_Admin_Detail' => array(
				'index',
				'menu',
				'create',
				'edit',
			),
			'Controller_Admin_Element' => array(
				'index',
				'menu',
				'create',
				'edit',
			),
			'Controller_Admin_Attribute' => array(
				'save',
			),
			'Controller_Admin_Report' => array(
				'index',
				'menu',
				'full',
				'filter',
				'getcsv',
			),
			'Controller_Admin_Order' => array(
				'index',
				'menu',
				'edit',
				'students',
			),
		),
		'manager' => array(
			'Controller_Admin_Measure' => array(
				'edit',
				'upload',
			),
			'Controller_Admin_School' => array(
				'create',
			),
			'Controller_Admin_Student' => array(
				'create',
			),
			'Controller_Admin_Body_Part' => array(
				'create',
			),
			'Controller_Admin_Size' => array(
				'create',
			),
			'Controller_Admin_Model' => array(
				'edit',
				'delete',
			),
			'Controller_Admin_Detail' => array(
				'delete',
			),
			'Controller_Admin_Element' => array(
				'delete',
			),
			'Controller_Admin_Order' => array(
				'create',
			),
		),
	),
	
	/**
	 * Salt for the login hash
	 */
	'login_hash_salt' => 'put_some_salt_in_here',

	/**
	 * $_POST key for login username
	 */
	'username_post_key' => 'username',

	/**
	 * $_POST key for login password
	 */
	'password_post_key' => 'password',
);
