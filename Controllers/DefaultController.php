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
		return $this->render([], 'home');
	}

	public function laundry()
	{
		return $this->render([], 'laundry');
	}

}