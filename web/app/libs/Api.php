<?php
	
	class Api {
		private $handler;
		private $baseUrl = API_BASE_URL;
		private $header = array(
			'Api-Token: ' . API_TOKEN
		);
		private $lists = array(
			'Contacto Felvet'   => 1,
			'Descarga de guia'  => 2,
			'Agenda de llamada' => 3
		);

		public function __construct($return = true) {
			$this->handler = curl_init();
			curl_setopt($this->handler, CURLOPT_HTTPHEADER, $this->header);
			if ($return) {
				curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, true);
			}
			else {
				curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, false);
			}
		}

		public function saveUser($email, $name, $list = 'not defined') {
			$data = array(
				'contact' => array(
					'email'     => $email,
					'firstName' => $name
				)
			);

			curl_setopt($this->handler, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($this->handler, CURLOPT_POST, true);
			curl_setopt($this->handler, CURLOPT_URL, $this->baseUrl . 'contacts');

			$response = curl_exec($this->handler);
			curl_close($this->handler);

			if ($list !== 'not defined') {
				if (array_key_exists($list, $this->lists)) {
					// Call API Again And Move User To Desired List
					$response   = json_decode($response, true);
					$contact_id = intval($response['contact']['id']);

					$data = array(
						'contactList' => array(
							'list'     => $this->lists[$list],
							'contact'  => $contact_id,
							'status'   => 1
						)
					);
					$data = json_encode($data);
					
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL            =>  $this->baseUrl . 'contactLists',
						CURLOPT_HTTPHEADER     => $this->header,
						CURLOPT_POST           => true,
						CURLOPT_POSTFIELDS     => $data,
						CURLOPT_RETURNTRANSFER => true
					));
					$response = curl_exec($curl);
					curl_close($curl);
				}
				else {
					die('List Does Not Exist');
				}
			}
		}

		public function findEntry($email, $list = null) {
			if ($list === null) {
				curl_setopt($this->handler, CURLOPT_URL, $this->baseUrl . "contacts?email={$email}");
			}
			else {
				curl_setopt($this->handler, CURLOPT_URL, $this->baseUrl . "contacts?email={$email}&listid={$this->lists[$list]}");
			}
			
			curl_setopt($this->handler, CURLOPT_POST, false);
			curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, true);
			$response = json_decode(curl_exec($this->handler), true);
			curl_close($this->handler);
			return (sizeof($response['contacts']) < 1) ? false : true;
		}
	}