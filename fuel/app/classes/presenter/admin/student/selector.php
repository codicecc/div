<?php
class Presenter_Admin_Student_Selector extends \Presenter{
	public function view(){
		$this->students = Model_Student::find('all');
	}
}
