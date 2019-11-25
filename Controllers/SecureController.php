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

			$email = $_POST['email'];
			$password = $_POST['password'];

//			tu powinna być autoryzacja
			if(isset($_POST['email']))
			{
				$url = "http://$_SERVER[HTTP_HOST]/";
				header("Location: {$url}DormitoryNotebooks/?page=home");
			}



			return $this->render([], 'login');
		}


	}