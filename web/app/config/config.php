<?php
	
	// Site Name
	define('SITENAME', 'FELVET');

	// TimeStamp
	define('TIMESTAMP', '2-0');
	
	// Roots
	define('PUBLICROOT', '/public');
	define('APPROOT', dirname(dirname(__FILE__)));
	define('INCLUDES', APPROOT . '/views/inc/');
	define('HELPERS', APPROOT . '/helpers/');

	// Mail
	define('MAILTO', ''); // Owner's Email Address
	define('CAPTCHA_SECRET_KEY', ''); // Google reCaptcha Secret Key

	// Database
	define('DB_HOST', ''); // Database Host
	define('DB_NAME', ''); // Database Name
	define('DB_USER', ''); // Database Username
	define('DB_PASS', ''); // Database Password

	// Active Campaign API
	define('API_BASE_URL', 'https://felvet.api-us1.com/api/3/');
	define('API_TOKEN', ''); // API Header's Token

	// Admin Access
	define('ADMIN_NAME', ''); // Username
	define('ADMIN_PASS', ''); // Password