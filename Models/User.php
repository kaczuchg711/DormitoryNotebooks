
<?php

	class User
	{
		private $password;
		private $name;

		public function __construct(string $password, string $name)
		{
			$this->password = $password;
			$this->name = $name;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public static function user_from_sql()
		{
			require_once 'connect.php';
			$connection = @new mysqli($host,$db_user,$db_password,$db_name);
			
			if($connection->connect_error != null)
			{
				echo "Error:".$connection->connect_error;
			}
			else
			{
				echo "it works";
				$query = "Select * from testt where name = 'Maciek' and password='pomidor'";
				if ($result = @$connection->query($query))
				{
					if($result->num_rows)
					{
						$result_table = $result->fetch_assoc();
						$name = $result_table['name'];
						$password = $result_table['password'];
						echo $name.$password;
						$result->free();
					}
					else
					{
						echo "bledne haslo lub login";
					}
				}

				$connection->close();
			}


			return 1;
		}
	}


	$u = User::user_from_sql();

?>
