<?php

	class Blog extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'blog',
				'current_title' => 'Página no disponible',
				'header'        => true
			];
			$this->view('404/index', $data);
		}
	}