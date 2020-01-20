<?php

	require_once "AppController.php";
	require_once "Models/Database.php";

	class AdminController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function show_users()
		{
			$db = new Database();

			$user = $db->get_all_users();

			$this->render([$user],"users");
		}
	}