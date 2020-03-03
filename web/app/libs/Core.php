<?php

	class Core {
		protected $controller = 'Home';
		protected $method     = 'index';
		protected $params     = [];

		public function __construct() {
			$url = $this->getUrl();

			// Controller
			$controllerName = $this->parseUrlValue($url[0]);

			if (file_exists("../app/controllers/{$controllerName}.php")) {
				$this->controller = $controllerName;
				unset($url[0]);
			}

			require_once "../app/controllers/{$this->controller}.php";
			$this->controller = new $this->controller;

			// Method
			if (isset($url[1])) {
				$methodName = $this->parseUrlValue($url[1]);
				if (method_exists($this->controller, $methodName)) {
					$this->method = $methodName;
					unset($url[1]);
				}
			}

			// Params
			if ($url) {
				$this->params = array_values($url);
			}

			// Call Controller's Method with Params Arr
			call_user_func_array(
				[
					$this->controller,
					$this->method
				],
				$this->params
			);
		}

		private function getUrl() {
			if (isset($_GET['url'])) {
				$url = $_GET['url'];
				$url = rtrim($url, '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}

		private function parseUrlValue($value) {
			$value = str_replace('-', ' ', $value);
			$value = ucwords($value);
			$value = str_replace(' ', '', $value);
			return $value;
		}
	}