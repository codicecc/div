<?php
class Presenter_Admin_Body_Part_Selector extends \Presenter{
	public function view(){
		$this->body_parts = Model_Body_part::find('all');
	}
}
