	 <?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

return array (
	// Navigation bar
	'navigation_bar' => array(
			 'measures' => array(
					'text'   => 'Measures',
					'rights' => 'Controller_Admin_Measure.menu',
					'sub' => array(
						 '/admin/school' => array(
								'text'   => 'School',
								'rights' => 'Controller_Admin_School.index'
						 ),
						 '/admin/student' => array(
								'text'   => 'Student',
								'rights' => 'Controller_Admin_Student.index'
						 ),
						 '/admin/measure' => array(
								'text'   => 'Measure',
								'rights' => 'Controller_Admin_Measure.index'
						 ),
						 '/admin/body/part' => array(
								'text'   => 'BodyPart',
								'rights' => 'Controller_Admin_Body_Part.index'
						 ),
						 '/admin/size' => array(
								'text'   => 'Size',
								'rights' => 'Controller_Admin_Size.index'
						 ),
					)
			 ),
			'models' => array(
					'text'   => 'Models',
					'rights' => 'Controller_Admin_Model.menu',
					'sub' => array(
						 '/admin/element' => array(
								'text'   => 'Element',
								'rights' => 'Controller_Admin_Element.index'
						 ),
						 '/admin/detail' => array(
								'text'   => 'Detail',
								'rights' => 'Controller_Admin_Detail.index'
						 ),
						 '/admin/model' => array(
								'text'   => 'Model',
								'rights' => 'Controller_Admin_Model.index'
						 ),
					)
			 ),
			'orders' => array(
					'text'   => 'Orders',
					'rights' => 'Controller_Admin_Order.menu',
					'sub' => array(
						 '/admin/order' => array(
								'text'   => 'Order',
								'rights' => 'Controller_Admin_Order.index'
						 ),
					)
			 ),
  			'reports' => array(
					'text'   => 'Reports',
					'rights' => 'Controller_Admin_Report.menu',
					'sub' => array(
						 '/admin/report/full' => array(
								'text'   => 'Full',
								'rights' => 'Controller_Admin_Order.index'
						 ),
						 '/admin/report/filter' => array(
								'text'   => 'Filter',
								'rights' => 'Controller_Admin_Order.index'
						 ),
						 '/admin/report/box' => array(
								'text'   => 'Box',
								'rights' => 'Controller_Admin_Orders.index'
						 ),
					)
			 ),
			 '/admin/users' => array(
					'text'   => 'Users',
					'rights' => 'Controller_Admin_Users.menu'
			 ),
			'help' => array(
					'text'   => 'Help',
					'rights' => 'Controller_Admin_Help.menu',
					'sub' => array(
						 '/admin/help' => array(
								'text'   => 'Help',
								'rights' => 'Controller_Admin_Help.index'
						 ),
						 '/admin/info' => array(
								'text'   => 'Info',
								'rights' => 'Controller_Admin_Info.index'
						 ),
						 
					)
			 ),
		),
	);
