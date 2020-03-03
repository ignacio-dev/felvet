<?php

	class Home extends Controller {
		public function index() {
			$data = [
				'current_menu'  => 'home',
				'current_title' => 'Comportamiento, asesoramiento y nutrición para gatos',
				'header'        => true
			];
			$this->view('Home/index', $data);
		}
	}