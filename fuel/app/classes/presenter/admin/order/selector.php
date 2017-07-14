<?php
class Presenter_Admin_Order_Selector extends \Presenter{
	public function view(){
		$this->orders = Model_Order::find('all', array('order_by' => 'name'));
	}
}
