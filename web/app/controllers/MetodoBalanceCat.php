<?php
	
	class MetodoBalanceCat extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'metodo-balance-cat',
				'current_title' => 'Método (Balance-Cat)',
				'header'        => true
			];
			$this->view('MetodoBalanceCat/index', $data);
		}
	}