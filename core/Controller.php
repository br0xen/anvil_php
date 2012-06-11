<?php

class Controller {
	public function __construct() { }

	public function load_model($model=NULL) {
		// All models end with '_model'
		if(is_array($model)) {
			foreach($model as $k=>$m) {
				$model[$k]=$m."_model";
			}
		} else {
			$model.="_model";
		}
		$this->_load_files($model, "models");
	}

	public function load_library($library=NULL) {
		// All libraries end with '_library'
		if(is_array($library)) {
			foreach($library as $k=>$l) {
				$library[$k]=$l."_library";
			}
		} else {
			$library.="_library";
		}
		$this->_load_files($library, "libraries");
	}

	public function load_view($views=NULL) {
		// No restrictions on view names
		$this->_load_files($views, "views", true);
	}

	// Runs through a potential array of files
	// Checks for existence, then _load_file
	public function _load_files($a=null, $func=null, $multi=false) {
		if(isset($a) && isset($func)) {
			if(is_array($a)) {
				foreach($a as $aa) {
					if(defined('PHP_DIR')) {
						$f = PHP_DIR.$func."/".$aa.".php";
					} else {
						$f = $func."/".$aa.".php";
					}
					$this->_load_file($f, ($multi===true));
				}
			} else {
				if(defined('PHP_DIR')) {
					$f = PHP_DIR.$func."/".$a.".php";
				} else {
					$f = $func."/".$a.".php";
				}
				$this->_load_file($f, ($multi===true));
			}
		}
	}

	// Checks if the file exists and includes it
	public function _load_file($filename=NULL,$multi=false) {
		if(isset($filename) && file_exists($filename)) {
			if($multi) {
				include($filename);
			} else {
				require_once($filename);
			}
		}
	}
}
