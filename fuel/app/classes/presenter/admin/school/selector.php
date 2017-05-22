<?php
class Presenter_Admin_School_Selector extends \Presenter{
	public function view(){
		$this->schools = Model_School::find('all');
	}
}
