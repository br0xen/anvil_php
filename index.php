<?php

require_once('config.php');

// Load up the base classes
require_once('core/Controller.php');
require_once('core/Model.php');
// We need the uri library for things to work
require_once('core/uri_library.php');
// Load up the globals
foreach($global_libraries as $alib) {
	require_once('libraries/'.$alib.'_library.php');
}
foreach($global_models as $amod) {
	require_once('models/'.$amod.'_model.php');
}

$uri = new Uri_library($_SERVER['REQUEST_URI']);
$uri_array = $uri->getFullArray();
while($starting_token-- > 0) { array_shift($uri_array); }
// Check if $uri->getItem(0) is a controller
if(file_exists('controllers/'.$uri_array[0].'_controller.php')) {
	// File exists, set the cc_name and pop the uri_array
	$class_name = array_shift($uri_array);
	$cc_name = $class_name."_controller";
} else {
	// Not a valid controller, so hit the default
	$cc_name = $default_controller."_controller";
}
// Pull in the requested Controller
require_once('controllers/'.$cc_name.'.php');

$c_class = new $cc_name;
// Were we provided a method?
$c_func = $uri_array[0];
if($c_func!==false && method_exists($c_class, $c_func)) {
	$c_func = array_shift($uri_array);
	call_user_func_array(array($c_class, $c_func), $uri_array);
} else {
	// Nope, hit the controller's index
	if(method_exists($c_class, 'index')) {
		call_user_func_array(array($c_class, "index"), $uri_array);
	}
}


?>
