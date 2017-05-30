<?php
class Presenter_Admin_Body_Part_Sizeselector extends \Presenter{
	public function view(){
		$this->body_parts = Model_Body_part::find('all',array(
			'order_by' => array('name' => 'asc'),	
		));
	}
}
