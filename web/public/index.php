<?php
	
	// Load Config
	require_once '../app/config/config.php';
	
	// Load Libs
	spl_autoload_register(function($className) {
		require_once "../app/libs/{$className}.php";
	});
	
	// Init
	new Core();