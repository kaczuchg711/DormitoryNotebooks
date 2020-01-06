<body style="background: #3a3a3a; color: white">
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
				//			require_once 'connect.php';

				$host = 'localhost';
				$db_user = 'tkacza';
				$db_password = 'pomidorowa';
				$db_name = 'testdb';

				try
				{
					$conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_password);
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					echo "it works";
					$a = $conn->query('SELECT * from testtb');
					$b = $a->fetch(PDO::FETCH_ASSOC);
					echo $b['name'];

					$conn = null;
				}
				catch(PDOException $e)
				{
					echo "Connection failed: " . $e->getMessage();
				}

				//			$connection = @new mysqli($host,$db_user,$db_password,$db_name);
				//			echo "hej";
				//			if($connection->connect_error != null)
				//			{
				//				echo "Error:".$connection->connect_error;
				//			}
				//			else
				//			{
				//				echo "it works";
				//				$query = "Select * from testt where name = 'Maciek' and password='pomidor'";
				//				if ($result = @$connection->query($query))
				//				{
				//					if($result->num_rows)
				//					{
				//						$result_table = $result->fetch_assoc();
				//						$name = $result_table['name'];
				//						$password = $result_table['password'];
				//						echo $name.$password;
				//						$result->free();
				//					}
				//					else
				//					{
				//						echo "bledne haslo lub login";
				//					}
				//				}
				//
				//				$connection->close();
				//			}

				return 1;
			}
		}

		$u = User::user_from_sql();

	?>
</body>