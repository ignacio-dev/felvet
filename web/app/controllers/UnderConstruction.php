<?php
	
	class UnderConstruction extends Controller {
		public function index() {
			$data = [
				'current_menu'  => '404',
				'current_title' => 'Página no disponible',
				'header'        => true
			];
			$this->view('404/index', $data);
		}
	}