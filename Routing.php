<?php

	require_once 'Controllers/DefaultController.php';
	require_once 'Controllers/SecureController.php';

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
					'home' =>
						[
							'controller' => 'DefaultController',
							'action' => 'home'
						],
					'laundry' =>
						[
							'controller' => 'DefaultController',
							'action' => 'laundry'
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