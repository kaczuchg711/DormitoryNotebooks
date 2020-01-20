<?php

	require_once 'Controllers/DefaultController.php';
	require_once 'Controllers/SecureController.php';
	require_once 'Controllers/LaundryController.php';
	require_once 'Controllers/AdminController.php';

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
					'check_login' =>
						[
							'controller' => 'SecureController',
							'action' => 'check_login'
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
					'show_users' =>
					[
						'controller' => 'AdminController',
						'action' => 'show_users'
					]
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