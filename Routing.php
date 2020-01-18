<?php

	require_once 'Controllers/DefaultController.php';
	require_once 'Controllers/SecureController.php';
	require_once 'Controllers/LaundryController.php';

	class Routing
	{
		private $routes = [];

		public function __construct()
		{
			$this->routes =
				[
					'login' =>
						[
							'controller' => 'SecureController',
							'action' => 'login'
						],
					'logout' =>
						[
							'controller' => 'SecureController',
							'action' => 'logout'
						],
					'home' =>
						[
							'controller' => 'DefaultController',
							'action' => 'home'
						],
					'laundry' =>
						[
							'controller' => 'LaundryController',
							'action' => 'laundry'
						],
					'book_laundry' =>
						[
							'controller' => 'LaundryController',
							'action' => 'book_laundry'
						],
					'cancel_laundry' =>
						[
							'controller' => 'LaundryController',
							'action' => 'cancel_laundry'
						],
				];
		}

		public function run()
		{

			$page = isset($_GET['page']) ? $_GET['page'] : 'login';

			if(isset($this->routes[$page]))
			{
				$controller = $this->routes[$page]['controller'];
				$action = $this->routes[$page]['action'];
				$object = new $controller;
				$object->$action();
			}
		}
	}