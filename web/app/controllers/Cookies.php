<?php
	
	class Cookies extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'cookies',
				'current_title' => 'Política de cookies',
				'header'        => true
			];
			$this->view('Cookies/index', $data);
		}
	}