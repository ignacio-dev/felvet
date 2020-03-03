<?php

	class Controller {
		// Call Model
		public function model($model) {
			require_once "../app/model/{$model}.php";
			return new $model;
		}

		// Call View
		public function view($view, $data = []) {
			if (file_exists("../app/views/{$view}.php")) {
				// Data Constants
				define('HEADER', $data['header']);
				define('CURRENT_MENU', $data['current_menu']);
				define('CURRENT_TITLE', $data['current_title']);
				if ($_COOKIE['cookiesAccepted'] == 'YES') {
					define('COOKIES_ACCEPTED', true);
				}
				else {
					define('COOKIES_ACCEPTED', false);
				}

				// Includes And Requires
				require_once INCLUDES . 'head.php';
				if (HEADER) require_once INCLUDES . 'header.php';
				require_once "../app/views/{$view}.php";
				if (!COOKIES_ACCEPTED) include_once '../app/views/Cookies/message.php';
				require_once INCLUDES . 'foot.php';
			}
			else {
				die('View not found');
			}
		}
	}