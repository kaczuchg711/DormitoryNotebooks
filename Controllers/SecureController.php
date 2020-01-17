<?php
	// pytanie do prowadzacego dlaczego tu nie jest potrzebne ../
	require_once "AppController.php";
	require_once "Models/Database.php";

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
					$user = $db->user_from_base($email);
					$db->disconnect();

					if($user == false)
					{
						return $this->render(["wrong login"], 'login');
					}

					if($user->getPassword() == $password)
					{
						$url = "http://$_SERVER[HTTP_HOST]/";

						$_SESSION['id'] = 1;


						header("Location: {$url}/DormitoryNotebooks?page=home");
					}
					else
					{
						return $this->render(["wrong password"], 'login');
					}
				}
				catch(PDOException $e)
				{
					die("Connection failed: " . $e->getMessage());
				}

			}

			return $this->render([], 'login');
		}

		public function logout()
		{
			@session_unset();
			@session_destroy();
			$url = "http://$_SERVER[HTTP_HOST]/";
			header("Location: {$url}/DormitoryNotebooks?page=login");
		}
	}