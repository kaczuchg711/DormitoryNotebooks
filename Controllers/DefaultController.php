<?php

	require_once "AppController.php";

	class DefaultController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{

			$type = $_SESSION['user']->getType();

			if($type == "admin")
			{
				$is_admin = true;
			}
			else
			{
				$is_admin = false;
			}

			return $this->render([$is_admin], 'home');
		}

		public function laundry()
		{


			return $this->render([], 'laundry');
		}


	}