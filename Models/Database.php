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

				$this->conn->exec("set names utf8");

				// set the PDO error mode to exception
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}
			catch(PDOException $e)
			{
				die("Connection failed: " . $e->getMessage());
			}
		}

		public function disconnect()
		{
			$this->conn = null;
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

		public function get_laundry_log()
		{
			$sql =
				'SELECT Laundries_logs.date,
						   User_details.name,
						   User_details.surname,
						   Flats.number,
						   Laundries_logs.start_time_occupancy,
						   Laundries_logs.end_time_occupancy,
						   Laundries.number
					from Laundries_logs,
							 User_details,
							 Flats,
							 Laundries,
							 Users
					where Laundries_logs.id_laundry = Laundries.id_laundry
					  and Laundries_logs.id_occupying_user = Users.id_user
					  and Users.id_user_details = User_details.id_user_details
					  and Users.id_user_flat = Flats.id_flat
					order by Laundries_logs.id_laundries_logs desc
					Limit 3';

	
			$result = $this->conn->query($sql);
			if($result->rowCount() == 0)
			{
				die('error in get_laundry_log');
			}



			return $result;
		}
	}