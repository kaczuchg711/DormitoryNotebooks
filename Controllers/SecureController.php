<?php

	require_once "AppController.php";

	class SecureController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			return $this->render([], 'index');
		}

		public function login()
		{


			if(!empty($_POST['email']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];

				$servername = "localhost";
				$username = "tkacza";
				$dbpassword = "Pomidorowa4!";
				try
				{
					$conn = new PDO("mysql:host=$servername;dbname=Dorm", $username, $dbpassword);// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = "SELECT email,password FROM Users;";
					$result = $conn->query($sql);

					$result_array = $result->fetch();

					$dbemail = $result_array[0];
					$dbupassword = $result_array[1];

					if($dbemail == $email and $dbupassword == $password)
					{
						$result = null;
						$conn = null;
						$url = "http://$_SERVER[HTTP_HOST]/";
						header("Location: {$url}/DormitoryNotebooks/?page=home");
					}

					die('zle' . '<br>' . $dbemail . '<br>' . $email . '<br>' . $dbupassword . '<br>' . $password);
					$result = null;
					$conn = null;

				}
				catch(PDOException $e)
				{
					die("Connection failed: " . $e->getMessage());
				}


			}
			else
			{
				return $this->render([], 'login');
			}


		}


	}