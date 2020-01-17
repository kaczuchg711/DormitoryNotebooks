<?php

	class AppController
	{
		private $request = null;

		function __construct()
		{

			$this->request = strtolower($_SERVER['REQUEST_METHOD']);
			session_start();
		}

		function isGet()
		{
			return $this->request === 'get';
		}

		function isPost()
		{
			return $this->request === 'post';
		}

		function render($variables = array(), $fileName = null)
		{
			$templatePath = $fileName ? dirname(__DIR__) . '/Views/' . get_class($this) . '/' . $fileName . '.php' : '';
			$output = 'File not found';
			if(file_exists($templatePath))
			{
				extract($variables);
				ob_start();
				include $templatePath;
				$output = ob_get_clean();
			}

			print $output;
		}
	}