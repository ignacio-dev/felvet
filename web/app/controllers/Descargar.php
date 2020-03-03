<?php
	
	class Descargar extends Controller {
		// PDF File
		private $secretFilePath = APPROOT . '/ffMgfjslLY6rLwDgnTW/fjslk.pdf';
		private $publicFilePath = 'FELVET_GUIA-DE-COMPORTAMIENTO.pdf';

		public function index() {
			session_start();
			$data = [
				'current_menu'  => 'descargar',
				'current_title' => 'Descargar guía gratuita',
				'header'        => false
			];
			$this->view('Descargar/index', $data);
		}

		public function gracias() {
			session_start();
			if ($_SESSION['downloadActive']) {
				$data = [
					'current_menu'  => 'gracias',
					'current_title' => 'Gracias por descargar la guía',
					'header'        => false
				];
				$this->view('Descargar/gracias', $data);
			}
			else {
				$this->index();
			}
		}

		public function submit() {
			if (!isset($_POST['descargar'])) {
				$this->index();
			}
			else {
				// Form Data
				$dataInput = [
					'nombre' => htmlspecialchars($_POST['nombre']),
					'email'  => $_POST['email']
				];

				// Save User In Database
				$this->usuarioModel = $this->model('Usuario');
				if (!$this->usuarioModel->findEntryByEmail($dataInput['email'])) {
					$this->usuarioModel->add($dataInput, 'descargar');
				}

				// Save User In ACTIVE-CAMPAIGN
				$this->activeCampaign = new Api();
				$this->activeCampaign->saveUser(
					$dataInput['email'],
					$dataInput['nombre'],
					'Descarga de guia'
				);

				// Start Sessions And Load GRACIAS View
				session_start();
				$_SESSION['downloadActive'] = true;
				$this->gracias();
			}
		}

		public function pdf() {
			session_start();
			// Download Directly
			if ($_SESSION['downloadActive']) {
				header('Content-type: application/pdf');
				header('Content-Disposition: attachment; filename="' . $this->publicFilePath . '"');
				readfile($this->secretFilePath);
			}
			else {
				// Ask For Email Again
				if (!isset($_POST['resubmit'])) {
					$data = [
						'current_menu'  => 'descargar',
						'current_title' => 'Descargar guía gratuita',
						'header'        => false,
						'error'         => ''
					];
					$this->view('Descargar/reenteremail', $data);
				}
				else {
					// Download
					$this->activeCampaign = new Api();
					if ($this->activeCampaign->findEntry($_POST['reemail'], 'Descarga de guia')) {
						$_SESSION['downloadActive'] = true;
						header('Content-type: application/pdf');
						header('Content-Disposition: attachment; filename="' . $this->publicFilePath . '"');
						readfile($this->secretFilePath);
					}
					else {
						// Wrong Email
						$data = [
							'current_menu'  => 'descargar',
							'current_title' => 'Descargar guía gratuita',
							'header'        => false,
							'error'         => 'El email que has introducido no es válido. Por favor, asegúrate de que es la misma dirección de email a la que te ha llegado el enlace de descarga.'
						];
						$this->view('Descargar/reenteremail', $data);
					}
				}
			}
		}
	}