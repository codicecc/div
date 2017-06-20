<?php
class Presenter_Admin_Element_Selector extends \Presenter{
	public function view(){
		$this->elements = Model_Element::find('all');
	}
}
