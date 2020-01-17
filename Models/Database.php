<?php

	require_once "config.php";
	require_once "User.php";

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

		public function get_laundry_log_inv_limit_3()
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

			$this->connect();
			$result = $this->conn->query($sql);
			$this->disconnect();

			if($result->rowCount() == 0)
			{
				die('error in get_laundry_log');
			}

			$size = $result->rowCount();

			//				invert
			$laundry_log = array_fill(0, $size, null);

			while($row = $result->fetch(PDO::FETCH_NUM))
			{
				$laundry_log[--$size] = $row;
			}

			return $laundry_log;
		}

		public function user_from_base($email)
		{
			$query = "SELECT Users.login,
						   Users.email,
						   Users.password,
						   User_details.name,
						   User_details.surname,
						   Flats.number,
						   Roles.Role
					from Users,
						 User_details,
						 Flats,
						 Roles
					where (Users.id_user_details = User_details.id_user_details and
						  Users.id_user_flat = Flats.id_flat  and
						  Users.id_role = Roles.id_role) and
						  Users.email = '$email'";


			$this->connect();
			$data = $this->conn->query($query);
			$this->disconnect();

			if($data->rowCount() == 0)
			{
				return false;
			}

			$result = $data->fetchAll(PDO::FETCH_ASSOC);

			$vars = [];

			foreach($result as $x)
			{
				foreach($x as $y)
				{
					$vars[] = $y;
				}
			}

			return new User($vars[0], $vars[1], $vars[2], $vars[3], $vars[4], $vars[5], $vars[6]);

		}

		public function get_list_of_free_laundry()
		{
			$query = "Select number
						from Laundries,Laundries_logs
						where CURDATE() = Laundries_logs.date and
						Laundries.id_laundry != Laundries_logs.id_laundry and (CURRENT_TIME() - Laundries_logs.end_time_occupancy < 0);";

			$this->connect();
			$data = $this->conn->query($query);
			$this->disconnect();

			if($data->rowCount() == 0)
			{
				return false;
			}

			$result = $data->fetchAll(PDO::FETCH_ASSOC);

			$vars = [];

			foreach($result as $x)
			{
				foreach($x as $y)
				{
					$vars[] = $y;
				}
			}

			return $vars;
		}

		public function set_laundry_log()
		{

		}
	}
