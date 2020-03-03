<?php
	
	class Usuario {
		private $db;

		public function __construct() {
			$this->db = new Database();
		}

		public function get() {
			$this->db->query('SELECT * FROM usuarios');
			return $this->db->getResultSet();
		}

		public function add($dataInput, $origen) {
			$this->db->query('INSERT INTO usuarios (nombre, apellido, email, origen) VALUES (:nombre, :apellido, :email, :origen)');
			$this->db->bind(':nombre', $dataInput['nombre']);
			$this->db->bind(':apellido', $dataInput['apellido']);
			$this->db->bind(':email', $dataInput['email']);
			$this->db->bind(':origen', $origen);
			$this->db->execute();
		}

		public function findEntryByEmail($email) {
			$this->db->query('SELECT * FROM usuarios WHERE email = :email');
			$this->db->bind(':email', $email);
			$row = $this->db->getResultSingle();
			if ($this->db->getRowCount() > 0) {
				return true;
			}
			else {
				return false;
			}
		}
	} 