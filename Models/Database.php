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
				return ;
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

		public function get_user_from_base($email)
		{
			$query = "SELECT Users.id_user,
							Users.login,
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

			return new User($vars[0], $vars[1], $vars[2], $vars[3], $vars[4], $vars[5], $vars[6],$vars[7]);

		}

		public function get_list_of_free_laundry()
		{
			$query = "Select number from Laundries where number not in (
						Select number
						from Laundries,
							 Laundries_logs
						where CURDATE() = Laundries_logs.date
						  and Laundries.id_laundry = Laundries_logs.id_laundry
						  and (CURRENT_TIME() - Laundries_logs.end_time_occupancy < 0));";

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

		public function set_laundry_log($laundry_nr)
		{
			$this->connect();
			$id = $_SESSION['user']->getId();

			$query = "START TRANSACTION; INSERT INTO Laundries_logs (date, start_time_occupancy, end_time_occupancy, id_laundry, id_occupying_user)
					VALUES (CURDATE(), CURRENT_TIME(), TIME('25:00:00'), 
					(select Laundries.id_laundry from Laundries where number = '$laundry_nr'),'$id'); COMMIT;";

			$data = $this->conn->query($query);
			$this->disconnect();
		}

		public function get_now_occupying_users()
		{
			$this->connect();
			$query = "	select id_user
						from Users,
						Laundries_logs
						where Users.id_user = Laundries_logs.id_occupying_user
						and CURRENT_TIME() between Laundries_logs.start_time_occupancy and Laundries_logs.end_time_occupancy;";

			$data = $this->conn->query($query);
			$this->disconnect();

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

		public function update_laundry()
		{
			$id = $_SESSION['user']->getId();


			$query1 = "call last_book_laundry('$id',@a)";
			$query25 = "select @a";
			$query2 = 	"UPDATE Dorm.Laundries_logs t
						SET t.end_time_occupancy = (CURRENT_TIME -1)
						WHERE t.id_occupying_user = '$id'
						and id_laundries_logs = @a;";

			$this->connect();

			$this->conn->query($query1);

			$data = $this->conn->query($query25);

			$result = $data->fetchAll(PDO::FETCH_ASSOC);


			$this->conn->query($query2);

			$this->disconnect();

		}

		public function get_last_occupy_users()
		{
			$query = 'SELECT distinct Laundries_logs.id_occupying_user from Laundries_logs where start_time_occupancy  - CURRENT_TIME > -500 and Laundries_logs.date = current_date()';

			$this->connect();

			$data = $this->conn->query($query);

			$this->disconnect();
			$result = $data->fetchAll(PDO::FETCH_ASSOC);

			$id_users = [];

			foreach($result as $x)
			{
				foreach($x as $y)
				{
					$id_users[] = $y;

				}
			}

			return $id_users;

		}
	}
//	$x = new Database();
//	$y = $x->get_last_occupy_users();
//
//	foreach($y as $z)
//	{
//		echo $z;
//	}