<?php

class Welcome_controller extends Controller {
	public function __construct() { }

	public function index() {
		$this->load_views('welcome');
	}
}
