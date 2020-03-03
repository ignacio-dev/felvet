<?php
	
	class Servicios extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'servicios',
				'current_title' => 'Servicios',
				'header'        => true
			];
			$this->view('Servicios/index', $data);
		}
	}