<?php
	// pytanie do prowadzacego dlaczego tu nie jest potrzebne ../
	require_once "AppController.php";
	require_once "Database.php";

	class SecureController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function login()
		{

			if(!empty($_POST['email']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];

				try
				{

					$db = new Database();
					$db->connect();
					$dbupassword = $db->get_password($email);


					$db->disconnect();

					if($dbupassword == $password)
					{
						$url = "http://$_SERVER[HTTP_HOST]/";
						header("Location: {$url}/DormitoryNotebooks?page=home");
					}
					else
					{

						$this->render([], 'login');
						$_POST['email'] = null;
						$_POST['password'] = null;
						$url = "http://$_SERVER[HTTP_HOST]/";
						header("Location: {$url}/DormitoryNotebooks/?page=login");
					}

				}
				catch(PDOException $e)
				{
					die("Connection failed: " . $e->getMessage());
				}
			}
			$_POST['email'] = null;
			$_POST['password'] = null;

			return $this->render([], 'login');

		}


	}