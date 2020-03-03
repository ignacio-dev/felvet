<?php

	class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $name = DB_NAME;

		private $dbh;
		private $stmt;
		private $error;

		public function __construct() {
			$dsn = "mysql:host={$this->host};dbname={$this->name}";
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			try {
				$this->dbh = new PDO(
					$dsn,
					$this->user,
					$this->pass,
					$options
				);
			}
			catch(PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		public function query($sql) {
			$this->stmt = $this->dbh->prepare($sql);

		}

		public function bind($param, $val, $type = null) {
			if (is_null($type)) {
				switch (true) {
					// case is_int($value):
					// 	$type = PDO::PARAM_INT;
					// 	break;
					// case is_bool($value):
					// 	$type = PDO::PARAM_BOOL;
					// 	break;
					// case is_null($value):
					// 	$type = PDO::PARAM_NULL;
					// 	break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param, $val, $type);
		}

		public function execute() {
			return $this->stmt->execute();
		}

		public function getResultSet() {
			$this->execute();
			return $this->stmt->fetchAll(
				PDO::FETCH_OBJ
			);
		}

		public function getResultSingle() {
			$this->execute();
			return $this->stmt->fetch(
				PDO::FETCH_OBJ
			);
		}

		public function getRowCount() {
			return $this->stmt->rowCount();
		}
	}