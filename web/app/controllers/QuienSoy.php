<?php
	
	class QuienSoy extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'quien-soy',
				'current_title' => 'Quién soy',
				'header'        => true
			];
			$this->view('QuienSoy/index', $data);
		}
	}