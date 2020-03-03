<?php

	class Contacto extends Controller {
		private $mailto = MAILTO;
		private $captchaSecretKey = CAPTCHA_SECRET_KEY;

		public function index() {
			$data = [
				'current_menu'  => 'contacto',
				'current_title' => 'Contacto',
				'header'        => true
			];

			if (!isset($_POST['enviar'])) {
				$this->view('Contacto/index', $data);
			}
			else {
				$data['input'] = $this->formData();
				$errors = $this->validate($data['input']);

				if (!empty($errors)) {
					$data['errors'] = $errors;
					$this->view('Contacto/index', $data);
				}
				else {
					// Subscribe User To Mail List
					if ($data['input']['mailList'] == 'on') {
						$userInfo = [
							'nombre' => $data['input']['nombre'],
							'appellido' => $data['input']['appellido'],
							'email'  => $data['input']['email']
						];
						$this->usuarioModel = $this->model('Usuario');
						if (!$this->usuarioModel->findEntryByEmail($userInfo['email'])) {
							$this->usuarioModel->add($userInfo, 'contacto');
							
							// Save User On ACTIVE CAMPAING
							$this->activeCampaign = new Api();
							$this->activeCampaign->saveUser(
								$userInfo['email'],
								"{$userInfo['nombre']} {$userInfo['apellido']}",
								'Contacto Felvet'
							);
						}
					}
					$this->send($data['input']);
				}
			}
		}

			private function send($dataInput) {
				// Send Email To Site Owner
				$subject = 'FELVET.es - Nuevo Mensaje';

				$msg  = "Nombre: {$dataInput['nombre']}\n";
				$msg .= "Apellido: {$dataInput['apellido']}\n";
				$msg .= "Email: {$dataInput['email']}\n";
				$msg .= "Telefono: {$dataInput['telefono']}\n\n";
				$msg .= "Mensaje: \n{$dataInput['mensaje']}";

				$headers  = "From: {$dataInput['email']}";

				mail(
					$this->mailto,
					$subject,
					$msg,
					$headers
				);

				$this->success();
			}

			private function validate($formData = []) {
				$errors = [];

				// Nombre
				if (empty($formData['nombre'])) {
					$errors['nombre'] = 'Debes introducir tu nombre';
				}
				if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑçÇ\s']*$/", $formData['nombre'])) {
					$errors['nombre'] = 'Tu nombre no es válido';
				}

				// Appellido
				if (empty($formData['apellido'])) {
					$errtextareaors['apellido'] = 'Debes introducir tu apellido';
				}
				if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑçÇ\s']*$/", $formData['apellido'])) {
					$errors['apellido'] = 'Tu apellido no es válido';
				}

				// Email
				if (empty($formData['email'])) {
					$errors['email'] = 'Debes introducir tu email';
				}
				else {
					if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
						$errors['email'] = 'Tu email no es válido';
					}
				}

				// Telefono
				if ($formData['telefono'][0] == '+') {
					if (!preg_match("/^[0-9]*$/", substr($formData['telefono'], 1))) {
						$errors['telefono'] = 'El teléfono que has introducido no es válido';
					}
				}
				else {
					if(!preg_match("/^[0-9]*$/", $formData['telefono'])) {
						$errors['telefono'] = 'El teléfono que has introducido no es válido';
					}
				}

				// Mensaje
				if (empty($formData['mensaje'])) {
					$errors['mensaje'] = 'Debes escribir tu mensaje';
				}

				// Privacidad
				if ($formData['privacidad'] != 'on') {
					$errors['privacidad'] = 'Debes marcar esta casilla';
				}

				// Captcha
				$responseKey = $_POST['g-recaptcha-response' ];
				$curl        = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL            => 'https://www.google.com/recaptcha/api/siteverify',
				    CURLOPT_POST           => 1,
				    CURLOPT_POSTFIELDS     => array(
				        'secret'   => $this->captchaSecretKey,
				        'response' => $responseKey
				    )
				));
				$response = curl_exec($curl);
				curl_close($curl);
				if(strpos($response, '"success": true') !== FALSE) {
					//
				}
				else {
					$errors['captcha'] = 'Debes marcar esta casilla';
				}

				// Return
				return $errors;
			}

			private function formData() {
				$formData = [ 
					'nombre'     => htmlspecialchars($_POST['nombre']),
					'apellido'   => htmlspecialchars($_POST['apellido']),
					'email'      => $_POST['email'],
					'telefono'   => $_POST['telefono'],
					'mensaje'    => htmlspecialchars($_POST['mensaje']),
					'privacidad' => $_POST['privacidad'],
					'mailList'   => $_POST['mailList']
				];
				return $formData;
			}

		protected function success() {
			$data = [
				'current_menu'  => 'contacto',
				'current_title' => '¡Mensaje enviado!',
				'header'        => true
			];
			$this->view('Contacto/success', $data);
		}
	}