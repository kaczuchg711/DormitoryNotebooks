<?php

	require_once "config.php";

	class Database
	{
		private $username;
		private $password;
		private $host;
		private $database;
		private $conn;

		public function __construct()
		{
			$this->username = USERNAME;
			$this->password = PASSWORD;
			$this->host = HOST;
			$this->database = DATABASE;
			$this->conn = null;
		}

		public function connect()
		{
			try
			{
				$this->conn = new PDO(
					"mysql:host=$this->host;dbname=$this->database",
					$this->username,
					$this->password
				);

				// set the PDO error mode to exception
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
			{
				die("Connection failed: " . $e->getMessage());
			}
		}

		public function get_password($email)
		{
			$sql = "SELECT password FROM Users where email like '$email'";
			$result = $this->conn->query($sql);

			if($result->rowCount() == 0)
			{
				return false;
			}
			return $result->fetch()[0];
		}

		public function disconnect()
		{
			$this->conn = null;
		}


	}