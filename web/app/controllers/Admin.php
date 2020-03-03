<?php

	class Admin extends Controller {
		public function __construct() {
			$this->usuarioModel = $this->model('Usuario');
		}

		public function index() {
			$data = [
				'current_menu'  => 'home',
				'current_title' => 'Admin',
				'header'        => false
			];
			
			$this->view('Admin/index', $data);
		}

		public function login() {
			session_start();
			$_SESSION['access'] = false;

			if (!isset($_POST['login'])) {
				$this->index();
			}
			else {
				if ($_POST['username'] == ADMIN_NAME AND $_POST['password'] == ADMIN_PASS) {
					$_SESSION['access'] = true;
					$this->display();
				}
				else {
					$this->index();
				}
			}
		}

		public function display() {
			session_start();
			if ($_SESSION['access']) {
				$usuarios = $this->usuarioModel->get();
				$data = [
					'current_menu'  => 'home',
					'current_title' => 'Admin',
					'header'        => false,
					'usuarios'      => $usuarios
				];

				$this->view('Admin/display', $data);
			}
			else {
				$this->index();
			}
		}

		public function logout() {
			session_start();
			$_SESSION['access'] = false;
			unset($_SESSION['access']);
			session_destroy();
			$this->index();
		}
	}